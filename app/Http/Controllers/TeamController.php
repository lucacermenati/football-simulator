<?php

namespace App\Http\Controllers;

use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\JsonResponse;

class TeamController extends Controller
{
    public function index(): ResourceCollection
    {
        $teams = Team::query()->paginate(15);

        return TeamResource::collection($teams);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:teams,name',
            'logo' => 'sometimes|string|url',
            'first_color' => 'required|string|max:7',
            'second_color' => 'required|string|max:7',
            'year_of_foundation' => 'required|integer|min:1800|max:' . date('Y'),
            'stadium' => 'required|string|max:255',
            'competition_id' => 'sometimes|exists:competitions,id',
        ]);

        $team = Team::create($validated);

        if (isset($validated['competition_id'])) {
            $team->competitions()->attach($validated['competition_id']);
        }

        return response()->json(new TeamResource($team), 201);
    }

    public function show(Team $team): JsonResponse
    {
        $team->load(['players', 'competitions']);

        return response()->json(new TeamResource($team));
    }

    public function update(Request $request, Team $team): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'logo' => 'nullable|string|url',
            'first_color' => 'nullable|string|max:7',
            'second_color' => 'nullable|string|max:7',
            'year_of_foundation' => 'nullable|integer|min:1900|max:' . date('Y'),
            'stadium' => 'nullable|string|max:255',
        ]);

        $team->update($validated);

        return response()->json(new TeamResource($team));
    }

    public function destroy(Team $team): JsonResponse
    {
        $team->delete();

        return response()->json(null, 204);
    }

    public function factory(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'locale' => 'sometimes|string',
            'n' => 'sometimes|integer|min:1',
        ]);

        $locale = $validated['locale'] ?? config('app.faker_locale');
        $n = $validated['n'] ?? 1;

        $teams = Team::factory()->fromLocale($locale)->count($n)->make();

        return response()->json(TeamResource::collection($teams), 200);
    }
}
