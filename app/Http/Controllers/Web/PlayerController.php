<?php

namespace App\Http\Controllers\Web;

use App\Enums\Country;
use App\Filters\PlayerFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlayersFilterRequest;
use App\Http\Resources\PlayerResource;
use App\Models\Player;
use App\Services\PlayerGenerator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class PlayerController extends Controller
{
    public function index(PlayersFilterRequest $request, PlayerFilter $filter)
    {
        $players = $request->user()->players()->with('team')
            ->search($request->input('search'))
            ->filter($filter, $request)
            ->orderBy('created_at', 'desc')
            ->paginate(16)
            ->withQueryString();

        $nationalities = Player::query()
            ->pluck('nationality')
            ->unique()
            ->values();

        $teams = $request->user()->teams()->get();

        return Inertia::render('Players/Index', [
            'players' => PlayerResource::collection($players),
            'filters' => $request->filters(),
            'nationalities' => $nationalities,
            'teams' => $teams,
        ]);
    }

    public function show(Player $player)
    {
        $player->load('team');

        return Inertia::render('Players/Show', [
            'player' => $player,
        ]);
    }

    public function store(Request $request, PlayerGenerator $generator)
    {
        $validated = $request->validate([
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'nationality' => ['nullable', Rule::enum(Country::class)],
            'position' => 'nullable|string|max:255',
            'number' => 'nullable|integer|min:1|max:99',
        ]);

        $request->user()->players()->create($generator->attributes($validated));

        return redirect()->back()->with('success', 'Player created successfully!');
    }

    public function update(Request $request, Player $player)
    {
        $validated = $request->validate([
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'nationality' => ['required', Rule::enum(Country::class)],
            'position' => 'required|string|max:255',
            'number' => 'required|integer|min:1|max:99',
        ]);

        $player->update($validated);

        return redirect()->back()->with('success', 'Player updated successfully!');
    }

    public function generate(Request $request, PlayerGenerator $generator)
    {
        $validated = $request->validate([
            'size' => 'required|integer|min:1|max:500',
        ]);

        $request->user()->players()->createMany($generator->many($validated['size']));

        return redirect()->back()->with('success', 'Players generated successfully!');
    }

    public function destroy(Request $request, Player $player)
    {
        $player->delete();

        return redirect()->back()->with('success', 'Player deleted successfully!');
    }
}
