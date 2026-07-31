<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\Team;
use Inertia\Inertia;

class CompetitionTeamController extends Controller
{
    public function index(Competition $competition)
    {
        $teams = $competition->teams()->paginate(12);

        $availableTeams = Team::query()
            ->whereNotIn('id', $competition->teams()->pluck('teams.id'))
            ->get();

        return Inertia::render('Competitions/Teams', [
            'competition' => $competition,
            'teams' => TeamResource::collection($teams),
            'availableTeams' => TeamResource::collection($availableTeams),
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

    public function destroy(Competition $competition, string $teamId)
    {
        $competition->teams()->detach($teamId);

        return redirect()->back();
    }
}
