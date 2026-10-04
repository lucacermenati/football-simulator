<?php

namespace App\Http\Controllers\Api;

use App\Enums\Position;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlayersFilterRequest;
use App\Http\Resources\PlayerResource;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Enum;

class PlayerController extends Controller
{
    public function index(PlayersFilterRequest $request)
    {
        // TODO: use filter from common to filter
        $players = $request->user()->players()->with('team')
            ->search($request->input('search'))
            ->when($request->free, function ($query) {
                Log::info('Filtering free players');
                $query->whereNull('team_id');
            })
            ->when($request->input('position'), function ($query) use ($request) {
                $query->where('position', $request->input('position'));
            })
            ->when($request->input('nationality'), function ($query) use ($request) {
                $query->where('nationality', $request->input('nationality'));
            })
            ->orderBy('created_at', 'desc')
            ->paginate(16);

        return PlayerResource::collection($players)->response();
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'nullable|date',
            'nationality' => 'nullable|string|size:2',
            'position' => ['required', 'string', new Enum(Position::class)],
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
            'players.*.position' => ['required', 'string', new Enum(Position::class)],
            'players.*.number' => 'required|integer|min:1|max:99',
            'players.*.team_id' => 'sometimes|uuid|exists:teams,id',
        ]);

        $user = $request->user();

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
            'position' => ['sometimes', 'required', 'string', new Enum(Position::class)],
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
            'position' => ['sometimes', 'string', new Enum(Position::class)],
        ]);

        $n = $validated['n'] ?? 1;
        $locale = $validated['locale'] ?? null;

        $players = Player::factory()->country($locale)->count($n)->make([
            'team_id' => $validated['team_id'] ?? null,
            'position' => $validated['position'] ?? null,
        ]);

        return response()->json(PlayerResource::collection($players), 200);
    }
}
