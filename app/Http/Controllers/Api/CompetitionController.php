<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompetitionResource;
use App\Http\Resources\TeamStandingsResource;
use App\Models\Competition;
use App\Models\MatchPlayer;
use App\Models\Player;
use App\Queries\CompetitionStandings;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CompetitionController extends Controller
{
    public function index(Request $request): JsonResponse
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

        return CompetitionResource::collection($competitions)->response();
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:competitions,name',
            'description' => 'nullable|string',
            'logo' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $competition = $request->user()->competitions()->create($validated);

        if($request->hasFile('logo')) {
            $competition->uploadFile(
                $request->file('logo'),
                'competitions',
                'logo',
            );
        }

        return CompetitionResource::make($competition)
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Competition $competition): JsonResponse
    {
        Gate::authorize('view', $competition);

        return CompetitionResource::make($competition)->response();
    }

    public function update(Request $request, Competition $competition): JsonResponse
    {
        Gate::authorize('update', $competition);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $competition->update($validated);

        return CompetitionResource::make($competition)->response();
    }

    public function destroy(Competition $competition): JsonResponse
    {
        Gate::authorize('delete', $competition);

        $competition->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function standings(Competition $competition, CompetitionStandings $standings): JsonResponse
    {
        Gate::authorize('view', $competition);

        return TeamStandingsResource::collection(
            $standings->for($competition)
        )->response();
    }

    public function addTeam(Request $request, Competition $competition): JsonResponse
    {
        $validated = $request->validate([
            'team_id' => 'required|uuid|exists:teams,id',
        ]);

        $competition->teams()->syncWithoutDetaching($validated['team_id']);

        $competition->load(['teams']);

        return CompetitionResource::make($competition)->response();
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
