<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompetitionResource;
use App\Http\Resources\TeamResource;
use App\Models\Competition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class CompetitionTeamController extends Controller
{
    public function index(Request $request, Competition $competition)
    {
        Gate::authorize('owns', $competition);

        $teams = $competition->teams()->paginate(12);

        $availableTeams = $request->user()->teams()
            ->whereNotIn('id', $competition->teams()->pluck('teams.id'))
            ->get();

        return Inertia::render('Competitions/Teams', [
            'competition' => CompetitionResource::make($competition),
            'teams' => TeamResource::collection($teams),
            'availableTeams' => TeamResource::collection($availableTeams),
        ]);
    }

    public function add(Request $request, Competition $competition)
    {
        Gate::authorize('owns', $competition);

        $request->validate([
            'teams' => 'required|array',
            'teams.*' => 'exists:teams,id',
        ]);

        $teams = $request->user()->teams()
            ->whereIn('id', $request->teams)
            ->pluck('id');

        $competition->teams()->syncWithoutDetaching($teams);

        return redirect()->back();
    }

    public function destroy(Competition $competition, string $teamId)
    {
        Gate::authorize('owns', $competition);

        $competition->teams()->detach($teamId);

        return redirect()->back();
    }
}
