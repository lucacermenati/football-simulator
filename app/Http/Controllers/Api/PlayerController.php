<?php

namespace App\Http\Controllers\Api;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlayerResource;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\JsonResponse;

class PlayerController extends Controller
{
    public function index(): ResourceCollection
    {
        $players = Player::query()->get();

        return PlayerResource::collection($players);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'nullable|date',
            'nationality' => 'nullable|string|size:2',
            'role' => ['required', 'string', Role::validationRule()],
            'number' => 'required|integer|min:1|max:99',
            'team_id' => 'sometimes|uuid|exists:teams,id',
        ]);

        $player = Player::create($validated);

        return response()->json(new PlayerResource($player), 201);
    }

    public function bulkStore(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'players' => 'required|array|min:1',
            'players.*.first_name' => 'required|string|max:255',
            'players.*.last_name' => 'required|string|max:255',
            'players.*.birth_date' => 'nullable|date',
            'players.*.nationality' => 'nullable|string|size:2',
            'players.*.role' => ['required', 'string', Role::validationRule()],
            'players.*.number' => 'required|integer|min:1|max:99',
            'players.*.team_id' => 'sometimes|uuid|exists:teams,id',
        ]);

        $user = $request->user() ?? User::first();

        $createdPlayers = collect($validated['players'])->map(function ($playerData) use ($user) {
            return $user->players()->create($playerData);
        });

        return response()->json(PlayerResource::collection($createdPlayers), 201);
    }

    public function show(Player $player): JsonResponse
    {
        $player->load(['team']);

        return response()->json(new PlayerResource($player));
    }

    public function update(Request $request, Player $player): JsonResponse
    {
        $validated = $request->validate([
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'birth_date' => 'nullable|date',
            'nationality' => 'nullable|string|size:2',
            'role' => ['sometimes', 'required', 'string', Role::validationRule()],
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
        return PlayerResource::collection($team->players);
    }

    public function addToTeam(Request $request, Player $player): JsonResponse
    {
        $validated = $request->validate([
            'team_id' => 'required|uuid|exists:teams,id',
        ]);

        // Check if player already has a team
        if ($player->team_id !== null) {
            return response()->json([
                'message' => 'Player already belongs to a team'
            ], 409);
        }

        $player->update(['team_id' => $validated['team_id']]);
        $player->load(['team']);

        return response()->json(new PlayerResource($player));
    }

    public function removeFromTeam(Player $player): JsonResponse
    {
        $player->update(['team_id' => null]);
        $player->load(['team']);

        return response()->json(new PlayerResource($player));
    }

    public function factory(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'n' => 'sometimes|integer|min:1',
            'team_id' => 'sometimes|uuid|exists:teams,id',
            'locale' => 'sometimes|string',
            'role' => 'sometimes|string|in:' . implode(',', Role::values()),
        ]);

        $n = $validated['n'] ?? 1;
        $locale = $validated['locale'] ?? null;

        $players = Player::factory()->country($locale)->count($n)->make([
            'team_id' => $validated['team_id'] ?? null,
            'role' => $validated['role'] ?? null,
        ]);

        return response()->json(PlayerResource::collection($players), 200);
    }
}