<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompetitionResource;
use App\Http\Resources\PlayerStatisticResource;
use App\Http\Resources\TeamStandingsResource;
use App\Models\Competition;
use App\Queries\CompetitionStandings;
use App\Queries\CompetitionStatistics;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
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
        Gate::authorize('owns', $competition);

        return CompetitionResource::make($competition)->response();
    }

    public function update(Request $request, Competition $competition): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Gate::authorize('owns', $competition);

        $competition->update($validated);

        return CompetitionResource::make($competition)->response();
    }

    public function destroy(Competition $competition): JsonResponse
    {
        Gate::authorize('owns', $competition);

        $competition->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function standings(Competition $competition, CompetitionStandings $standings): JsonResponse
    {
        Gate::authorize('owns', $competition);

        return TeamStandingsResource::collection(
            $standings->for($competition)
        )->response();
    }

    public function statistics(Request $request, Competition $competition, CompetitionStatistics $statistics): JsonResponse
    {
        $request->validate([
            'limit' => 'nullable|integer|min:15|max:100',
        ]);

        Gate::authorize('owns', $competition);

        $limit = $request->input('limit', 15);

        return PlayerStatisticResource::collection(
            $statistics->for($competition)->load('team')->take($limit)
        )->response();
    }

    // public function addTeam(Request $request, Competition $competition): JsonResponse
    // {
    //     $validated = $request->validate([
    //         'team_id' => 'required|uuid|exists:teams,id',
    //     ]);

    //     $competition->teams()->syncWithoutDetaching($validated['team_id']);

    //     $competition->load(['teams']);

    //     return CompetitionResource::make($competition)->response();
    // }

    // public function removeTeam(Request $request, Competition $competition): JsonResponse
    // {
    //     $validated = $request->validate([
    //         'team_id' => 'required|uuid|exists:teams,id',
    //     ]);

    //     $competition->teams()->detach($validated['team_id']);

    //     $competition->load(['teams']);

    //     return response()->json(new CompetitionResource($competition));
    // }
}