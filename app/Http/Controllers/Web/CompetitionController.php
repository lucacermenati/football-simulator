<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompetitionResource;
use App\Models\Competition;
use App\Models\FootballMatch;
use App\Models\MatchPlayer;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;

class CompetitionController extends Controller
{
    public function index(Request $request)
    {
        $competitions = $request->user()->competitions()
            ->orderBy('created_at', 'desc')
            ->paginate(11);

        return Inertia::render('Competitions/Index', [
            'competitions' => CompetitionResource::collection($competitions),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // ------ TODO: This can become an action: CreateCompetition that accepts a CompetitionRequest
        $competition = $request->user()->competitions()->create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($request->hasFile('logo')) {
            $competition->storeLogo($request->file('logo'));
        }
        // ------- END TODO

        return redirect()->back()
            ->with('message', 'Competition created successfully!');
    }

    public function show(Competition $competition)
    {
        return Inertia::render('Competitions/Show', [
            'competition' => $competition,
        ]);
    }

    public function update(Request $request, Competition $competition)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_logo' => 'boolean',
        ]);

        // ------ TODO: This can become an action: UpdateCompetition
        $data = Arr::except($validated, ['logo', 'remove_logo']);

        $competition->update($data);

        if ($request->input('remove_logo', false)) {
            $competition->removeLogo();
        }

        if ($request->hasFile('logo')) {
            $competition->storeLogo($request->file('logo'));
        }
        // ------- END TODO

        return redirect()->back()
            ->with('message', 'Competition updated successfully!');
    }

    public function destroy(Competition $competition)
    {
        $competition->delete();

        return redirect()->route('competitions.index')
            ->with('message', 'Competition deleted successfully!');
    }

    public function standings(Competition $competition)
    {
        // TODO: Make the standing calculation a service
        $standings = Team::select('id', 'name')
                    ->whereHas('competitions', function ($query) use ($competition) {
                        $query->where('competitions.id', $competition->id);
                    })->addSelect([
                        'points' => FootballMatch::selectRaw('
                            COALESCE(SUM(
                                CASE
                                    WHEN home_team_id = teams.id AND goal_home > goal_away THEN 3
                                    WHEN home_team_id = teams.id AND goal_home = goal_away THEN 1
                                    WHEN away_team_id = teams.id AND goal_away > goal_home THEN 3
                                    WHEN away_team_id = teams.id AND goal_away = goal_home THEN 1
                                    ELSE 0
                                END
                            ), 0)')
                            ->whereRaw('(matches.home_team_id = teams.id OR matches.away_team_id = teams.id)')
                            ->where('matches.competition_id', $competition->id)
                            ->where('matches.played', true),
                        'matches' => FootballMatch::selectRaw('COUNT(*)')
                            ->whereRaw('(matches.home_team_id = teams.id OR matches.away_team_id = teams.id)')
                            ->where('matches.competition_id', $competition->id)
                            ->where('matches.played', true),
                        'gol' => FootballMatch::selectRaw('
                            COALESCE(SUM(
                                CASE
                                    WHEN home_team_id = teams.id THEN goal_home
                                    WHEN away_team_id = teams.id THEN goal_away
                                    ELSE 0
                                END
                            ), 0)')
                            ->whereRaw('(matches.home_team_id = teams.id OR matches.away_team_id = teams.id)')
                            ->where('matches.competition_id', $competition->id)
                            ->where('matches.played', true),
                    ])
                    ->orderBy('points', 'desc')
                    ->orderBy('gol', 'desc')
                    ->get();

        return Inertia::render('Competitions/Standings', [
            'competition' => $competition,
            'standings' => $standings,
        ]);
    }

    public function scorers(Competition $competition)
    {
        // TODO: Make the top scorers calculation a service
        $scorers = Player::select('id', 'first_name', 'last_name')
                    ->whereHas('matches', function ($query) use ($competition) {
                        $query->where('matches.competition_id', $competition->id);
                    })
                    ->addSelect([
                        'goals' => MatchPlayer::query()
                            ->selectRaw('COUNT(*)')
                            ->whereHas('match', function ($query) use ($competition) {
                                $query->where('competition_id', $competition->id);
                            })
                            ->whereColumn('player_id', 'players.id')
                    ])
                    ->orderBy('goals', 'desc')
                    ->get();

        return Inertia::render('Competitions/Scorers', [
            'competition' => $competition,
            'scorers' => $scorers,
        ]);
    }
}