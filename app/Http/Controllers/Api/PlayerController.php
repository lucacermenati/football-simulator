<?php

namespace App\Http\Controllers\Api;

use App\Enums\Country;
use App\Enums\Position;
use App\Filters\PlayerFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlayersFilterRequest;
use App\Http\Resources\PlayerResource;
use App\Models\Player;
use App\Models\Team;
use App\Services\PlayerGenerator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\Enum;
use Symfony\Component\HttpFoundation\Response;

class PlayerController extends Controller
{
    public function index(PlayersFilterRequest $request, PlayerFilter $filter)
    {
        $players = $request->user()->players()->with('team')
            ->search($request->input('search'))
            ->filter($filter, $request)
            ->orderBy('created_at', 'desc')
            ->paginate(16);

        return PlayerResource::collection($players)->response();
    }

    public function store(Request $request, PlayerGenerator $generator): JsonResponse
    {
        $validated = $request->validate([
            'first_name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'birth_date' => 'sometimes|date',
            'nationality' => ['sometimes', 'string', new Enum(Country::class)],
            'position' => ['sometimes', 'string', new Enum(Position::class)],
            'number' => 'sometimes|integer|min:0|max:99',
        ]);

        $player = $request->user()->players()->create($generator->attributes($validated));

        return PlayerResource::make($player)->response()->setStatusCode(Response::HTTP_CREATED);
    }

    public function bulkStore(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'players' => 'required|array|min:1',
            'players.*.first_name' => 'required|string|max:255',
            'players.*.last_name' => 'required|string|max:255',
            'players.*.birth_date' => 'nullable|date',
            'players.*.nationality' => ['nullable', 'string', new Enum(Country::class)],
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
            'nationality' => ['nullable', 'string', new Enum(Country::class)],
            'position' => ['sometimes', 'required', 'string', new Enum(Position::class)],
            'number' => 'sometimes|required|integer|min:1|max:99',
            'team_id' => 'sometimes|required|uuid|exists:teams,id',
        ]);

        Gate::authorize('owns', $player);

        $player->update($validated);

        return response()->json(new PlayerResource($player));
    }

    public function destroy(Player $player): JsonResponse
    {
        Gate::authorize('owns', $player);

        $player->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
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
                'message' => 'Player already belongs to a team',
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
}
