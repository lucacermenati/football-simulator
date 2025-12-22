<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlayerResource;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\JsonResponse;

class PlayerController extends Controller
{
    public function index(): ResourceCollection
    {
        return PlayerResource::collection(
            Player::with(['team'])->get()
        );
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'nullable|date',
            'role' => 'required|string|max:255',
            'number' => 'required|integer|min:1|max:99',
            'team_id' => 'required|uuid|exists:teams,id',
        ]);

        $player = Player::create($validated);

        return response()->json(new PlayerResource($player), 201);
    }

    public function show(Player $player): JsonResponse
    {
        $player->load(['team', 'scoredMatches']);
        
        return response()->json(new PlayerResource($player));
    }

    public function update(Request $request, Player $player): JsonResponse
    {
        $validated = $request->validate([
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'birth_date' => 'nullable|date',
            'role' => 'sometimes|required|string|max:255',
            'number' => 'sometimes|required|integer|min:1|max:99',
            'team_id' => 'sometimes|required|uuid|exists:teams,id',
        ]);

        $player->update($validated);

        return response()->json(new PlayerResource($player));
    }

    public function destroy(Player $player): JsonResponse
    {
        $player->delete();

        return response()->json(null, 204);
    }
    
    public function byTeam(Team $team): ResourceCollection
    {
        return PlayerResource::collection(
            $team->players()->get()
        );
    }
}
