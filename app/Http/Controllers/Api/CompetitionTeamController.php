<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use App\Models\Competition;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\JsonResponse;

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

        return response()->json(['message' => 'Teams added to competition successfully']);
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
