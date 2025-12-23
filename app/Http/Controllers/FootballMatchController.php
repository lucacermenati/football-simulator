<?php

namespace App\Http\Controllers;

use App\Http\Resources\FootballMatchResource;
use App\Models\Competition;
use App\Models\FootballMatch;
use App\Models\Player;
use App\Models\Team;
use App\Services\CalendarGenerator;
use App\Services\PoissonMatchSimulator;
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

    public function show(FootballMatch $footballMatch): JsonResponse
    {
        $footballMatch->load(['competition', 'homeTeam', 'awayTeam', 'scorers']);

        return response()->json(new FootballMatchResource($footballMatch));
    }

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

    public function destroy(FootballMatch $footballMatch): JsonResponse
    {
        $footballMatch->delete();

        return response()->json(null, 204);
    }

    public function byCompetition(Competition $competition): ResourceCollection
    {
        $matches = $competition->matches;

        return FootballMatchResource::collection($matches);
    }

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

    public function removeScorer(FootballMatch $footballMatch, Player $player): JsonResponse
    {
        $footballMatch->scorers()->detach($player->id);

        $footballMatch->load(['competition', 'homeTeam', 'awayTeam', 'scorers']);

        return response()->json(new FootballMatchResource($footballMatch));
    }

    public function generateMatches(Request $request, Competition $competition)
    {
        $validated = $request->validate([
            'start_date' => 'sometimes|date',
        ]);

        $startDate = $validated['start_date'] ?? now();

        $matches = CalendarGenerator::generateMatches($competition, $startDate);

        $matches = FootballMatch::insert($matches);
        $matches = $competition->matches()->with([
            'awayTeam',
            'homeTeam',
        ])
        ->orderBy('date')
        ->get();

        return response()->json(FootballMatchResource::collection($matches));
    }

    public function simulate(FootballMatch $footballMatch, PoissonMatchSimulator $simulator): JsonResponse
    {
        $simulator->simulate($footballMatch);

        return response()->json(new FootballMatchResource($footballMatch->refresh()));
    }
}