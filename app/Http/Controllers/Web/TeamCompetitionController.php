<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamCompetitionController extends Controller
{
    public function store(Request $request, Team $team)
    {
        $request->validate([
            'competition_id' => 'required|exists:competitions,id',
        ]);

        $team->competitions()->attach($request->competition_id);

        return redirect()->back()->with('success', 'Team added to competition successfully');
    }
}
