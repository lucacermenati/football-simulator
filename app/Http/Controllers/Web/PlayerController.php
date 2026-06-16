<?php

namespace App\Http\Controllers\Web;

use App\Enums\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlayersFilterRequest;
use App\Http\Resources\PlayerResource;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class PlayerController extends Controller
{
    public function index(PlayersFilterRequest $request)
    {
        $players = $request->user()->players()->with('team')
            ->when($request->input('search'), function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('first_name', 'like', '%' . $request->input('search') . '%')
                        ->orWhere('last_name', 'like', '%' . $request->input('search') . '%');
                });
            })
            ->when($request->free, function ($query) {
                $query->whereNull('team_id');
            })
            ->when($request->input('role'), function ($query) use ($request) {
                $query->where('role', $request->input('role'));
            })
            ->when($request->input('nationality'), function ($query) use ($request) {
                $query->where('nationality', $request->input('nationality'));
            })
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

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'nationality' => ['nullable', Rule::enum(Country::class)],
            'role' => 'nullable|string|max:255',
            'number' => 'nullable|integer|min:1|max:99',
        ]);

        $playerData = array_merge(array_filter($request->except('nationality')), [
            'user_id' => $request->user()->id,
            'team_id' => null,
        ]);

        Player::factory()->country($request->input('nationality', null))
            ->create($playerData);

        return redirect()->back()->with('success', 'Player created successfully!');
    }

    public function generate(Request $request)
    {
        $validated = $request->validate([
            'size' => 'required|integer|min:1|max:500',
        ]);

        Player::factory()->country()->count($validated['size'])->create([
            'user_id' => $request->user()->id,
            'team_id' => null,
        ]);

        return redirect()->back()->with('success', 'Players generated successfully!');
    }

    public function destroy(Request $request, Player $player)
    {
        $player->delete();

        return redirect()->back()->with('success', 'Player deleted successfully!');
    }
}