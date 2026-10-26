<?php

namespace App\Http\Controllers\Web;

use App\Enums\FlashType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Http\Resources\CompetitionResource;
use App\Http\Resources\PlayerResource;
use App\Http\Resources\TeamResource;
use App\Models\Competition;
use App\Models\Player;
use App\Models\Team;
use App\Sorters\TeamSorter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class TeamController extends Controller
{
    public function index(Request $request, TeamSorter $sorter)
    {
        $request->validate([
            'search' => 'string|nullable',
            'sort' => 'sometimes|nullable|string',
        ]);

        $teams = $request->user()->teams()
            ->search($request->search)
            ->sort($sorter, $request)
            ->paginate(16);

        return Inertia::render('Teams/Index', [
            'teams' => TeamResource::collection($teams),
            'availableCompetitions' => Inertia::lazy(function () use ($request) {
                $competitions = Competition::where('user_id', $request->user()->id)
                    ->whereDoesntHave('teams', function ($query) use ($request) {
                        $query->where('teams.id', $request->selected_team_id);
                    })
                    ->get();

                return CompetitionResource::collection($competitions);
            }),
        ]);
    }

    public function show(Team $team)
    {
        Gate::authorize('owns', $team);

        return Inertia::render('Teams/Show', [
            'team' => TeamResource::make($team),
        ]);
    }

    public function store(StoreTeamRequest $request)
    {
        $team = $request->user()->teams()->create($request->safe()->except('logo'));

        if ($request->hasFile('logo')) {
            $team->uploadFile(
                $request->file('logo'),
                'teams',
                'logo',
            );
        }

        return redirect()->back()->with(FlashType::Success->value, 'Team created successfully!');
    }

    public function update(UpdateTeamRequest $request, Team $team)
    {
        Gate::authorize('owns', $team);

        $team->update($request->safe()->except(['logo', 'remove_logo']));

        if ($request->boolean('remove_logo')) {
            $team->removeFile('logo');
        }

        if ($request->hasFile('logo')) {
            $team->uploadFile(
                $request->file('logo'),
                'teams',
                'logo',
            );
        }

        return redirect()->back()
            ->with(FlashType::Success->value, $team->name.' updated successfully!');
    }

    public function destroy(Team $team)
    {
        Gate::authorize('owns', $team);

        $team->delete();

        return redirect()->route('teams.index');
    }

    public function info(Team $team)
    {
        Gate::authorize('owns', $team);

        return Inertia::render('Teams/Info', [
            'team' => TeamResource::make($team),
        ]);
    }

    public function players(Team $team)
    {
        Gate::authorize('owns', $team);

        $players = $team->players()
            ->orderBy('number')
            ->get();

        return Inertia::render('Teams/Players', [
            'team' => TeamResource::make($team),
            'players' => PlayerResource::collection($players),
        ]);
    }

    public function lineup(Team $team)
    {
        Gate::authorize('owns', $team);

        $lineupQuery = $team->players()
            ->orderBy('position_on_field');

        $startingEleven = $lineupQuery
            ->limit(11)
            ->get()
            ->groupBy('position');

        $substitutes = $lineupQuery
            ->offset(11)
            ->get();

        return Inertia::render('Teams/Lineup', [
            'team' => TeamResource::make($team),
            'startingEleven' => $startingEleven->map(fn ($players) => PlayerResource::collection($players)),
            'substitutes' => PlayerResource::collection($substitutes),
        ]);
    }

    public function addPlayer(Request $request, Team $team)
    {
        Gate::authorize('owns', $team);

        $validated = $request->validate([
            'player_id' => [
                'required',
                Rule::exists('players', 'id')
                    ->where('user_id', $request->user()->id),
            ],
        ]);

        Player::find($validated['player_id'])->update([
            'team_id' => $team->id,
        ]);

        return redirect()->back()->with(FlashType::Success->value, 'Player added successfully!');
    }
}
