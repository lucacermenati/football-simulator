<?php

namespace App\Http\Controllers;

use App\Http\Resources\FootballMatchResource;
use App\Models\Competition;
use App\Models\FootballMatch;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\JsonResponse;

/**
 * @group Football Match Management
 *
 * APIs for managing football matches
 */
class FootballMatchController extends Controller
{
    /**
     * Get all football matches
     *
     * Returns a list of all football matches with related competition and teams.
     *
     * @apiResource App\Http\Resources\FootballMatchResource
     * @apiResourceCollection Illuminate\Http\Resources\Json\ResourceCollection
     * @apiResourceModel App\Models\FootballMatch
     *
     * @return ResourceCollection
     */
    public function index(): ResourceCollection
    {
        return FootballMatchResource::collection(
            FootballMatch::with(['competition', 'homeTeam', 'awayTeam'])->get()
        );
    }

    /**
     * Create a new football match
     *
     * Creates a new football match with the specified parameters. Teams must belong to the competition.
     *
     * @apiResource App\Http\Resources\FootballMatchResource
     * @apiResourceModel App\Models\FootballMatch
     * @response 422 scenario="Validation error" {"errors": {"competition_id": ["The competition id field is required."], "home_team_id": ["The home team id field is required."], "away_team_id": ["The away team id field is required."], "goal_home": ["The goal home field is required."], "goal_away": ["The goal away field is required."], "date": ["The date field is required."]}}}
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'competition_id' => 'required|uuid|exists:competitions,id',
            'home_team_id' => 'required|uuid|exists:teams,id',
            'away_team_id' => 'required|uuid|different:home_team_id|exists:teams,id',
            'goal_home' => 'required|integer|min:0',
            'goal_away' => 'required|integer|min:0',
            'date' => 'required|date',
            'played' => 'sometimes|boolean',
            'scorers' => 'nullable|array',
            'scorers.*.player_id' => 'required_with:scorers|uuid|exists:players,id',
            'scorers.*.minute' => 'required_with:scorers.*.player_id|integer|min:1|max:120',
        ]);

        // Validate that teams belong to the competition
        $competition = Competition::findOrFail($validated['competition_id']);
        $homeTeam = Team::findOrFail($validated['home_team_id']);
        $awayTeam = Team::findOrFail($validated['away_team_id']);

        $teamsInCompetition = $competition->teams->pluck('id')->toArray();

        if (!in_array($homeTeam->id, $teamsInCompetition) || !in_array($awayTeam->id, $teamsInCompetition)) {
            return response()->json([
                'errors' => ['teams' => 'One or both teams do not participate in the selected competition']
            ], 422);
        }

        // Create match
        $match = new FootballMatch();
        $match->fill($validated);
        $match->save();

        // Add goal scorers if provided
        if (isset($validated['scorers']) && !empty($validated['scorers'])) {
            collect($validated['scorers'])->each(function ($scorer) use ($match) {
                $match->scorers()->attach($scorer['player_id'], [
                    'minute' => $scorer['minute']
                ]);
            });
        }

        $match->load(['competition', 'homeTeam', 'awayTeam', 'scorers']);

        return response()->json(new FootballMatchResource($match), 201);
    }

    /**
     * Get a specific football match
     *
     * Returns the details of a specific football match including related competition, teams and scorers.
     *
     * @apiResource App\Http\Resources\FootballMatchResource
     * @apiResourceModel App\Models\FootballMatch
     *
     * @response scenario="Success" {"data": {"id": "123e4567-e89b-12d3-a456-426614174000", "date": "2023-10-15", "goal_home": 2, "goal_away": 1, "created_at": "2023-10-16T10:00:00.000000Z", "updated_at": "2023-10-16T10:00:00.000000Z", "competition": {...}, "home_team": {...}, "away_team": {...}, "scorers": [{...}], "scorers_with_minutes": [{...}]}}
     *
     * @param FootballMatch $footballMatch
     * @return JsonResponse
     */
    public function show(FootballMatch $footballMatch): JsonResponse
    {
        $footballMatch->load(['competition', 'homeTeam', 'awayTeam', 'scorers']);

        return response()->json(new FootballMatchResource($footballMatch));
    }

    /**
     * Update a football match
     *
     * Updates an existing football match with the provided data.
     *
     * @apiResource App\Http\Resources\FootballMatchResource
     * @apiResourceModel App\Models\FootballMatch
     *
     * @response 422 scenario="Validation error" {"errors": {...}}
     *
     * @param Request $request
     * @param FootballMatch $footballMatch
     * @return JsonResponse
     */
    public function update(Request $request, FootballMatch $footballMatch): JsonResponse
    {
        $validated = $request->validate([
            'competition_id' => 'sometimes|required|uuid|exists:competitions,id',
            'home_team_id' => 'sometimes|required|uuid|exists:teams,id',
            'away_team_id' => 'sometimes|required|uuid|different:home_team_id|exists:teams,id',
            'goal_home' => 'sometimes|required|integer|min:0',
            'goal_away' => 'sometimes|required|integer|min:0',
            'date' => 'sometimes|required|date',
            'played' => 'sometimes|boolean',
        ]);

        // If competition or teams changed, validate that teams belong to the competition
        if (isset($validated['competition_id']) || isset($validated['home_team_id']) || isset($validated['away_team_id'])) {
            $competition_id = $validated['competition_id'] ?? $footballMatch->competition_id;
            $home_team_id = $validated['home_team_id'] ?? $footballMatch->home_team_id;
            $away_team_id = $validated['away_team_id'] ?? $footballMatch->away_team_id;

            $competition = Competition::findOrFail($competition_id);
            $teamsInCompetition = $competition->teams->pluck('id')->toArray();

            if (!in_array($home_team_id, $teamsInCompetition) || !in_array($away_team_id, $teamsInCompetition)) {
                return response()->json([
                    'errors' => ['teams' => 'One or both teams do not participate in the selected competition']
                ], 422);
            }
        }

        // Update match
        $footballMatch->update($validated);

        $footballMatch->load(['competition', 'homeTeam', 'awayTeam', 'scorers']);

        return response()->json(new FootballMatchResource($footballMatch));
    }

    /**
     * Delete a football match
     *
     * Deletes a specific football match from the database.

     *
     * @param FootballMatch $footballMatch
     * @return JsonResponse
     */
    public function destroy(FootballMatch $footballMatch): JsonResponse
    {
        $footballMatch->delete();

        return response()->json(null, 204);
    }

    /**
     * Get matches by competition
     *
     * Returns all football matches for a specific competition.
     *
     * @apiResource App\Http\Resources\FootballMatchResource
     * @apiResourceCollection Illuminate\Http\Resources\Json\ResourceCollection
     * @apiResourceModel App\Models\FootballMatch
     *

     *
     * @response scenario="Success" {"data": [{"id": "123e4567-e89b-12d3-a456-426614174000", "date": "2023-10-15", "goal_home": 2, "goal_away": 1, "created_at": "2023-10-16T10:00:00.000000Z", "updated_at": "2023-10-16T10:00:00.000000Z", "competition": {...}, "home_team": {...}, "away_team": {...}}]}
     *
     * @param Competition $competition
     * @return ResourceCollection
     */
    public function byCompetition(Competition $competition): ResourceCollection
    {
        return FootballMatchResource::collection(
            $competition->matches()->with(['homeTeam', 'awayTeam'])->get()
        );
    }

    /**
     * Get matches by team
     *
     * Returns all football matches where the specified team played (either as home or away team).
     *
     * @apiResource App\Http\Resources\FootballMatchResource
     * @apiResourceCollection Illuminate\Http\Resources\Json\ResourceCollection
     * @apiResourceModel App\Models\FootballMatch
     *

     *
     * @response scenario="Success" {"data": [{"id": "123e4567-e89b-12d3-a456-426614174000", "date": "2023-10-15", "goal_home": 2, "goal_away": 1, "created_at": "2023-10-16T10:00:00.000000Z", "updated_at": "2023-10-16T10:00:00.000000Z", "competition": {...}, "home_team": {...}, "away_team": {...}}]}
     *
     * @param Team $team
     * @return ResourceCollection
     */
    public function byTeam(Team $team): ResourceCollection
    {
        // Use a union of home and away matches
        $matches = $team->homeMatches()
            ->with(['competition', 'awayTeam'])
            ->get()
            ->concat(
                $team->awayMatches()->with(['competition', 'homeTeam'])->get()
            );

        return FootballMatchResource::collection($matches);
    }

    /**
     * Add a scorer to a match
     *
     * Adds a player as a goal scorer to a football match at a specific minute.
     *
     * @apiResource App\Http\Resources\FootballMatchResource
     * @apiResourceModel App\Models\FootballMatch
     *
     * @response 422 scenario="Validation error" {"errors": {"player_id": ["The player id field is required."], "minute": ["The minute field is required."]}}
     *
     * @param Request $request
     * @param FootballMatch $footballMatch
     * @return JsonResponse
     */
    public function addScorer(Request $request, FootballMatch $footballMatch): JsonResponse
    {
        $validated = $request->validate([
            'player_id' => 'required|uuid|exists:players,id',
            'minute' => 'required|integer|min:1|max:120',
        ]);

        $player = Player::findOrFail($validated['player_id']);

        // Check if player is in one of the teams playing
        $teamIds = [$footballMatch->home_team_id, $footballMatch->away_team_id];
        if (!in_array($player->team_id, $teamIds)) {
            return response()->json([
                'errors' => ['player_id' => 'Player does not belong to any team playing in this match']
            ], 422);
        }

        // Attach the player with the minute
        $footballMatch->scorers()->attach($player->id, ['minute' => $validated['minute']]);

        $footballMatch->load(['competition', 'homeTeam', 'awayTeam', 'scorers']);

        return response()->json(new FootballMatchResource($footballMatch));
    }

    /**
     * Remove a scorer from a match
     *
     * Removes a player from the list of goal scorers for a football match.
     *
     * @apiResource App\Http\Resources\FootballMatchResource
     * @apiResourceModel App\Models\FootballMatch
     *
     * @param FootballMatch $footballMatch
     * @param Player $player
     * @return JsonResponse
     */
    public function removeScorer(FootballMatch $footballMatch, Player $player): JsonResponse
    {
        $footballMatch->scorers()->detach($player->id);

        $footballMatch->load(['competition', 'homeTeam', 'awayTeam', 'scorers']);

        return response()->json(new FootballMatchResource($footballMatch));
    }
}
