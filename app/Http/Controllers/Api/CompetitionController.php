<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompetitionResource;
use App\Models\Competition;
use App\Models\FootballMatch;
use App\Models\MatchPlayer;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class CompetitionController extends Controller
{
    public function index(Request $request): ResourceCollection
    {
        $request->validate([
            'page' => 'sometimes|integer|min:1',
            'per_page' => 'sometimes|integer|min:1|max:100',
        ]);

        $page = $request->get('page', 1);
        $perPage = $request->get('per_page', 10);

        $competitions = $request->user()->competitions()
            ->orderBy('created_at', 'desc')
            ->paginate($perPage, '*', 'page', $page);

        return CompetitionResource::collection($competitions);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:competitions,name',
            'description' => 'nullable|string',
        ]);

        $competition = Competition::create($validated);

        return response()->json(new CompetitionResource($competition), 201);
    }

    public function show(Competition $competition): JsonResponse
    {
        $competition->load(['teams']);

        return response()->json(new CompetitionResource($competition));
    }

    public function update(Request $request, Competition $competition): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $competition->update($validated);

        return response()->json(new CompetitionResource($competition));
    }

    public function destroy(Competition $competition): JsonResponse
    {
        $competition->delete();

        return response()->json(null, 204);
    }

    public function addTeam(Request $request, Competition $competition): JsonResponse
    {
        $validated = $request->validate([
            'team_id' => 'required|uuid|exists:teams,id',
        ]);

        $competition->teams()->syncWithoutDetaching($validated['team_id']);

        $competition->load(['teams']);

        return response()->json(new CompetitionResource($competition));
    }

    public function removeTeam(Request $request, Competition $competition): JsonResponse
    {
        $validated = $request->validate([
            'team_id' => 'required|uuid|exists:teams,id',
        ]);

        $competition->teams()->detach($validated['team_id']);

        $competition->load(['teams']);

        return response()->json(new CompetitionResource($competition));
    }

    public function standings(Competition $competition): JsonResponse
    {
        $cacheKey = "competition.{$competition->id}.standings";
        $isCached = Cache::has($cacheKey);

        $standings = Cache::remember($cacheKey, now()->addHours(24), function () use ($competition) {
                return Team::select('id', 'name')
                    ->whereHas('competitions', function ($query) use ($competition) {
                        $query->where('competitions.id', $competition->id);
                    })->addSelect([
                        'points' => FootballMatch::selectRaw('
                            COALESCE(SUM(
                                CASE
                                    WHEN home_team_id = teams.id AND goal_home > goal_away THEN 3
                                    WHEN home_team_id = teams.id AND goal_home = goal_away THEN 1
                                    WHEN away_team_id = teams.id AND goal_away > goal_home THEN 3
                                    WHEN away_team_id = teams.id AND goal_away = goal_home THEN 1
                                    ELSE 0
                                END
                            ), 0)')
                            ->whereRaw('(matches.home_team_id = teams.id OR matches.away_team_id = teams.id)')
                            ->where('matches.competition_id', $competition->id)
                            ->where('matches.played', true),
                        'matches' => FootballMatch::selectRaw('COUNT(*)')
                            ->whereRaw('(matches.home_team_id = teams.id OR matches.away_team_id = teams.id)')
                            ->where('matches.competition_id', $competition->id)
                            ->where('matches.played', true),
                        'gol' => FootballMatch::selectRaw('
                            COALESCE(SUM(
                                CASE
                                    WHEN home_team_id = teams.id THEN goal_home
                                    WHEN away_team_id = teams.id THEN goal_away
                                    ELSE 0
                                END
                            ), 0)')
                            ->whereRaw('(matches.home_team_id = teams.id OR matches.away_team_id = teams.id)')
                            ->where('matches.competition_id', $competition->id)
                            ->where('matches.played', true),
                    ])
                    ->orderBy('points', 'desc')
                    ->orderBy('gol', 'desc')
                    ->get();
            });

        return response()->json($standings)
            ->header('X-Cache', $isCached ? 'HIT' : 'MISS');
    }

    public function scorers(Competition $competition): JsonResponse
    {
        $cacheKey = "competition.{$competition->id}.scorers";
        $isCached = Cache::has($cacheKey);

        $scorers = Cache::remember($cacheKey, now()->addHours(24), function () use ($competition) {
                return Player::select('id', 'first_name', 'last_name')
                    ->whereHas('matches', function ($query) use ($competition) {
                        $query->where('matches.competition_id', $competition->id);
                    })
                    ->addSelect([
                        'goals' => MatchPlayer::query()
                            ->selectRaw('COUNT(*)')
                            ->whereHas('match', function ($query) use ($competition) {
                                $query->where('competition_id', $competition->id);
                            })
                            ->whereColumn('player_id', 'players.id')
                    ])
                    ->orderBy('goals', 'desc')
                    ->get();
            });

        return response()->json($scorers)
            ->header('X-Cache', $isCached ? 'HIT' : 'MISS');
    }
}