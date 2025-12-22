<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompetitionResource;
use App\Models\Competition;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\JsonResponse;

class CompetitionController extends Controller
{
    public function index(): ResourceCollection
    {
        $competitions = Competition::query()->get();

        return CompetitionResource::collection($competitions);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:competitions,name',
            'description' => 'nullable|string',
        ]);

        $competition = Competition::create($validated);

        return response()->json(new CompetitionResource($competition), 201);
    }

    public function show(Competition $competition): JsonResponse
    {
        $competition->load(['teams']);

        return response()->json(new CompetitionResource($competition));
    }

    public function update(Request $request, Competition $competition): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $competition->update($validated);

        return response()->json(new CompetitionResource($competition));
    }

    public function destroy(Competition $competition): JsonResponse
    {
        $competition->delete();

        return response()->json(null, 204);
    }

    public function addTeam(Request $request, Competition $competition): JsonResponse
    {
        $validated = $request->validate([
            'team_id' => 'required|uuid|exists:teams,id',
        ]);

        // Attach the team only if not already present (prevents duplicates)
        $competition->teams()->syncWithoutDetaching($validated['team_id']);

        $competition->load(['teams']);

        return response()->json(new CompetitionResource($competition));
    }
}
