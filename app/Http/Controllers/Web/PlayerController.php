<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlayerResource;
use App\Models\Player;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PlayerController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'sometimes|string'
        ]);

        $players = $request->user()->players()
            ->when($request->input('search'), function ($query) use ($request) {
                // TODO: Implement with a searchable trait
                $query->where('first_name', 'like', '%' . $request->input('search') . '%')
                    ->orWhere('last_name', 'like', '%' . $request->input('search') . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(16);

        return Inertia::render('Players/Index', [
            'players' => PlayerResource::collection($players),
        ]);
    }

    public function show(Player $player)
    {
        $player->load('team');

        return Inertia::render('Players/Show', [
            'player' => $player,
        ]);
    }
}
