<?php

namespace App\Http\Controllers\Web;

use App\Filters\PlayerFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\GeneratePlayersRequest;
use App\Http\Requests\PlayersFilterRequest;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Http\Resources\PlayerResource;
use App\Http\Resources\TeamResource;
use App\Models\Player;
use App\Services\PlayerGenerator;
use App\Sorters\PlayerSorter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class PlayerController extends Controller
{
    public function index(PlayersFilterRequest $request, PlayerFilter $filter, PlayerSorter $sorter)
    {
        $players = $request->user()->players()->with('team')
            ->search($request->input('search'))
            ->filter($filter, $request)
            ->sort($sorter, $request)
            ->paginate(16)
            ->withQueryString();

        $nationalities = $request->user()->players()
            ->pluck('nationality')
            ->unique()
            ->values();

        $teams = $request->user()->teams()->get();

        return Inertia::render('Players/Index', [
            'players' => PlayerResource::collection($players),
            'filters' => $request->filters(),
            'nationalities' => $nationalities,
            'teams' => TeamResource::collection($teams),
        ]);
    }

    public function show(Player $player)
    {
        Gate::authorize('owns', $player);

        $player->load('team');

        return Inertia::render('Players/Show', [
            'player' => PlayerResource::make($player),
        ]);
    }

    public function store(StorePlayerRequest $request, PlayerGenerator $generator)
    {
        $request->user()->players()->create($generator->attributes($request->validated()));

        return redirect()->back()->with('success', 'Player created successfully!');
    }

    public function update(UpdatePlayerRequest $request, Player $player)
    {
        Gate::authorize('owns', $player);

        $player->update($request->validated());

        return redirect()->back()->with('success', 'Player updated successfully!');
    }

    public function generate(GeneratePlayersRequest $request, PlayerGenerator $generator)
    {
        $request->user()->players()->createMany($generator->many($request->integer('size', 1)));

        return redirect()->back()->with('success', 'Players generated successfully!');
    }

    public function destroy(Request $request, Player $player)
    {
        Gate::authorize('owns', $player);

        $player->delete();

        return redirect()->back()->with('success', 'Player deleted successfully!');
    }
}
