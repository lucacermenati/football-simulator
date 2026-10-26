<?php

namespace App\Http\Controllers\Api;

use App\Filters\PlayerFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\GeneratePlayersRequest;
use App\Http\Requests\PlayersFilterRequest;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Http\Resources\PlayerNationalityCountResource;
use App\Http\Resources\PlayerResource;
use App\Models\Player;
use App\Services\PlayerGenerator;
use App\Sorters\PlayerSorter;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PlayerController extends Controller
{
    public function index(PlayersFilterRequest $request, PlayerFilter $filter, PlayerSorter $sorter)
    {
        $players = $request->user()->players()->with('team')
            ->search($request->input('search'))
            ->filter($filter, $request)
            ->sort($sorter, $request)
            ->paginate(16);

        return PlayerResource::collection($players)->response();
    }

    public function store(StorePlayerRequest $request, PlayerGenerator $generator): JsonResponse
    {
        $player = $request->user()->players()->create($generator->attributes($request->validated()));

        return PlayerResource::make($player)->response()->setStatusCode(Response::HTTP_CREATED);
    }

    public function generate(GeneratePlayersRequest $request, PlayerGenerator $generator)
    {
        $players = $request->user()->players()->createMany(
            $generator->many($request->integer('size', 1))
        );

        return PlayerResource::collection($players)->response()->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Player $player): JsonResponse
    {
        Gate::authorize('owns', $player);

        $player->load(['team', 'matches']);

        return PlayerResource::make($player)->response();
    }

    public function update(UpdatePlayerRequest $request, Player $player): JsonResponse
    {
        Gate::authorize('owns', $player);

        $player->update($request->validated());

        return PlayerResource::make($player)->response();
    }

    public function destroy(Player $player): JsonResponse
    {
        Gate::authorize('owns', $player);

        $player->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function nationalities(PlayersFilterRequest $request, PlayerFilter $filter): JsonResponse
    {
        $nationalities = Player::where('user_id', $request->user()->id)
            ->selectRaw('nationality as code, COUNT(*) AS count')
            ->search($request->input('search'))
            ->filter($filter, $request)
            ->groupBy('nationality')
            ->orderBy('count', 'desc')
            ->get();

        return PlayerNationalityCountResource::collection($nationalities)->response();
    }
}
