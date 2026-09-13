<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use App\Models\Competition;
use App\Models\Team;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CompetitionTeamController extends Controller
{
    public function index(Competition $competition): JsonResponse
    {
        Gate::authorize('owns', $competition);

        return TeamResource::collection($competition->teams)->response();
    }

    public function store(Request $request, Competition $competition): JsonResponse
    {
        $request->validate([
            'teams' => 'array',
            'teams.*' => 'exists:teams,id',
        ]);

        Gate::authorize('owns', $competition);

        $teams = Team::where('user_id', $request->user()->id)
            ->whereIn('id', $request->teams)
            ->get();

        $competition->teams()->syncWithoutDetaching($teams->pluck('id'));

        return response()->json(null, Response::HTTP_CREATED);
    }

    public function destroy(Request $request, Competition $competition): JsonResponse
    {
        $request->validate([
            'teams' => 'array',
            'teams.*' => 'exists:teams,id',
        ]);

        Gate::authorize('owns', $competition);

        $teams = Team::where('user_id', $request->user()->id)
            ->whereIn('id', $request->teams)
            ->get();

        $competition->teams()->detach($teams->pluck('id'));

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function available(Request $request, Competition $competition): JsonResponse
    {
        $request->validate([
            'search' => 'nullable|string',
            'except' => 'nullable|string',
        ]);

        Gate::authorize('owns', $competition);

        $availableTeams = Team::where('user_id', $request->user()->id)
            ->search($request->search)
            ->whereDoesntHave('competitions', function ($query) use ($competition) {
                $query->where('competition_id', $competition->id);
            })
            ->when($request->input('except', false), function ($query) use ($request) {
                $query->whereNotIn('id', explode(',', $request->input('except')));
            })
            ->paginate(15);

        return TeamResource::collection($availableTeams)->response();
    }
}
