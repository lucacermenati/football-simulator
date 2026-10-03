<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompetitionResource;
use App\Models\Competition;
use App\Models\Team;
use App\Queries\TeamPositions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TeamCompetitionController extends Controller
{
    public function index (Team $team, TeamPositions $positions)
    {
        Gate::authorize('owns', $team);

        return response()->json(
            $positions->for($team)
        );
    }

    public function available(Request $request, Team $team)
    {
        $request->validate([
            'search' => 'nullable|string',
        ]);

        Gate::authorize('owns', $team);

        $availableCompetitions = Competition::where('user_id', $request->user()->id)
            ->search($request->input('search', null))
            ->whereDoesntHave('teams', function ($query) use ($team) {
                $query->where('teams.id', $team->id);
            })
            ->paginate(15);

        return CompetitionResource::collection($availableCompetitions)->response();
    }
}
