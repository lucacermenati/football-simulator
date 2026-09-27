<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Queries\TeamPositions;

class TeamCompetitionController extends Controller
{
    public function index (Team $team, TeamPositions $positions)
    {
        // Gate::authorize('owns', $team);

        return response()->json(
            $positions->for($team)
        );
    }
}
