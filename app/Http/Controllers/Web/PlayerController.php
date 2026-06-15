<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlayersFilterRequest;
use App\Http\Resources\PlayerResource;
use App\Models\Player;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PlayerController extends Controller
{
    public function index(PlayersFilterRequest $request)
    {
        $players = $request->user()->players()
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
            ->orderBy('created_at', 'desc')
            ->paginate(16)
            ->withQueryString();

        return Inertia::render('Players/Index', [
            'players' => PlayerResource::collection($players),
            'filters' => $request->filters(),
        ]);
    }

    public function show(Player $player)
    {
        $player->load('team');

        return Inertia::render('Players/Show', [
            'player' => $player,
        ]);
    }

    public function generate(Request $request)
    {
        $validated = $request->validate([
            'size' => 'required|integer|min:1|max:500',
        ]);

        Player::factory()->fromRandomLocale()->count($validated['size'])->create([
            'user_id' => $request->user()->id,
            'team_id' => null,
        ]);

        return redirect()->back()->with('success', 'Players generated successfully!');
    }
}
