<?php

namespace App\Http\Controllers\Api;

use App\Enums\Country;
use App\Enums\Position;
use App\Filters\PlayerFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlayersFilterRequest;
use App\Http\Resources\PlayerResource;
use App\Models\Player;
use App\Services\PlayerGenerator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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

    public function show(Player $player): JsonResponse
    {
        Gate::authorize('owns', $player);

        $player->load(['team']);

        return PlayerResource::make($player)->response();
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

        return PlayerResource::make($player)->response();
    }

    public function destroy(Player $player): JsonResponse
    {
        Gate::authorize('owns', $player);

        $player->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
