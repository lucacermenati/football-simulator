<?php

namespace App\Http\Controllers;

use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    public function index(): ResourceCollection
    {
        return TeamResource::collection(
            Team::with(['players'])->get()
        );
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'logo' => 'nullable|string|url',
            'first_color' => 'nullable|string|max:7',
            'second_color' => 'nullable|string|max:7',
            'year_of_foundation' => 'nullable|integer|min:1900|max:' . date('Y'),
            'stadium' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $team = Team::create($validator->validated());

        return response()->json(new TeamResource($team), 201);
    }

    public function storeViaFactory(Request $request): JsonResponse
    {
        $team = Team::factory()->setLocale($request->locale)->create();

        return response()->json(new TeamResource($team), 201);
    }

    public function show(Team $team): JsonResponse
    {
        $team->load(['players', 'competitions']);

        return response()->json(new TeamResource($team));
    }

    public function update(Request $request, Team $team): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'logo' => 'nullable|string|url',
            'first_color' => 'nullable|string|max:7',
            'second_color' => 'nullable|string|max:7',
            'year_of_foundation' => 'nullable|integer|min:1900|max:' . date('Y'),
            'stadium' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $team->update($validator->validated());

        return response()->json(new TeamResource($team));
    }

    public function destroy(Team $team): JsonResponse
    {
        $team->delete();

        return response()->json(null, 204);
    }
}
