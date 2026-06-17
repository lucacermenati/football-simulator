<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlayerResource;
use App\Http\Resources\TeamResource;
use App\Models\Competition;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Inertia\Inertia;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'string|nullable'
        ]);

        $teams = $request->user()->teams()
            ->when($request->input('search'), function ($query) use ($request) {
                // TODO: Implement with a searchable trait
                $query->where('name', 'like', '%' . $request->input('search') . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(16);

        return Inertia::render('Teams/Index', [
            'teams' => TeamResource::collection($teams),
            'availableCompetitions' => Inertia::lazy(function () use ($request) {
                return Competition::where('user_id', $request->user()->id)
                    ->whereDoesntHave('teams', function ($query) use ($request) {
                        $query->where('teams.id', $request->selected_team_id);
                    })
                    ->get();
            }),
        ]);
    }

    public function show(Request $request, Team $team)
    {
        return Inertia::render('Teams/Show', [
            'team' => TeamResource::make($team),
        ]);
    }

    public function update(Request $request, Team $team)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'history' => 'nullable|string',
            'stadium' => 'nullable|string',
            'year_of_foundation' => 'nullable|integer|min:1800|max:' . date('Y'),
            'rating' => 'required|integer|min:30|max:100',
            'first_color' => 'required|string',
            'second_color' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'remove_logo' => ''
        ]);

        $data = Arr::except($validated, ['logo', 'remove_logo']);

        $team->update($data);

        if ($request->input('remove_logo')){
            $team->removeLogo();
        }

        if ($request->hasFile('logo')) {
            $team->storeLogo($request->file('logo'));
        }

        return redirect()->back()
            ->with('message', $team->name . ' updated successfully!');
    }

    public function destroy(Team $team)
    {
        $team->delete();

        return redirect()->route('teams.index');
    }

    public function info(Team $team)
    {
        return Inertia::render('Teams/Info', [
            'team' => TeamResource::make($team),
        ]);
    }

    public function players(Team $team)
    {
        $players = $team->players()
            ->orderBy('number')
            ->get();

        return Inertia::render('Teams/Players', [
            'team' => TeamResource::make($team),
            'players' => PlayerResource::collection($players),
        ]);
    }

    public function addPlayer(Request $request, Team $team)
    {
        $validated = $request->validate([
            'player_id' => 'required|exists:players,id',
        ]);

        Player::find($validated['player_id'])->update([
            'team_id' => $team->id,
        ]);

        return redirect()->back()->with('message', 'Player added successfully!');
    }
}