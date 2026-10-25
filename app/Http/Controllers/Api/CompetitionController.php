<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompetitionRequest;
use App\Http\Requests\UpdateCompetitionRequest;
use App\Http\Resources\CompetitionResource;
use App\Http\Resources\PlayerStatisticResource;
use App\Http\Resources\TeamStandingsResource;
use App\Models\Competition;
use App\Queries\CompetitionStandings;
use App\Queries\CompetitionStatistics;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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

    public function store(StoreCompetitionRequest $request): JsonResponse
    {
        $competition = $request->user()->competitions()->create($request->safe()->except('logo'));

        if ($request->hasFile('logo')) {
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

    public function update(UpdateCompetitionRequest $request, Competition $competition): JsonResponse
    {
        Gate::authorize('owns', $competition);

        $competition->update($request->validated());

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
        Gate::authorize('owns', $competition);

        $request->validate([
            'limit' => 'nullable|integer|min:15|max:100',
        ]);

        $limit = $request->input('limit', 15);

        return PlayerStatisticResource::collection(
            $statistics->for($competition)->load('team')->take($limit)
        )->response();
    }
}
