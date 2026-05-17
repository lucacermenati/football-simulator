<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\Team;
use Inertia\Inertia;

class CompetitionTeamController extends Controller
{
    public function index(Request $request, Competition $competition)
    {
        $competitionTeamsQuery = $competition->teams();

        $availableTeams = Team::query()
            ->whereNotIn('id', $competitionTeamsQuery->pluck('teams.id'))
            ->get();

        return Inertia::render('Competitions/Teams', [
            'competition' => $competition,
            'teams' => $competitionTeamsQuery->paginate(10),
            'availableTeams' => $availableTeams,
        ]);
    }

    public function add(Request $request, Competition $competition)
    {
        $request->validate([
            'teams' => 'required|array',
            'teams.*' => 'exists:teams,id',
        ]);

        $competition->teams()->syncWithoutDetaching($request->teams);

        return redirect()->back();
    }

    public function destroy(Request $request, Competition $competition, $teamId)
    {
        $competition->teams()->detach($teamId);

        return redirect()->back();
    }
}
