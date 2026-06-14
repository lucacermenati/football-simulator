<?php

namespace App\Http\Controllers\Web;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlayerResource;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class PlayerController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'search' => 'sometimes|string',
            'free' => 'sometimes|integer',
            'role' => ['sometimes', Rule::enum(Role::class)],
        ]);

        $players = $request->user()->players()
            ->when($request->input('search'), function ($query) use ($request) {
                // TODO: Implement with a searchable trait
                $query->where('first_name', 'like', '%' . $request->input('search') . '%')
                    ->orWhere('last_name', 'like', '%' . $request->input('search') . '%');
            })
            ->when($request->boolean('free'), function ($query) {
                $query->where('first_name', 'like', '%a%');
            })
            ->when($request->input('role'), function ($query) use ($request) {
                $query->where('role', $request->input('role'));
            })
            ->orderBy('created_at', 'desc')
            ->paginate(16);

        return Inertia::render('Players/Index', [
            'players' => PlayerResource::collection($players),
            'filters' => $validated,
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