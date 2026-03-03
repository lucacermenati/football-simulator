<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlayerResource;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;
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
        dd($request->all(), $team);
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
        return Inertia::render('Teams/Players', [
            'team' => TeamResource::make($team),
            'players' => PlayerResource::collection($team->players),
        ]);
    }
}