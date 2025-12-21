<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompetitionResource;
use App\Models\Competition;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class CompetitionController extends Controller
{
    public function index(): ResourceCollection
    {
        return CompetitionResource::collection(
            Competition::with(['teams'])->get()
        );
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $competition = Competition::create($validator->validated());

        return response()->json(new CompetitionResource($competition), 201);
    }

    public function show(Competition $competition): JsonResponse
    {
        $competition->load(['teams', 'matches.homeTeam', 'matches.awayTeam']);
        
        return response()->json(new CompetitionResource($competition));
    }

    public function update(Request $request, Competition $competition): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $competition->update($validator->validated());

        return response()->json(new CompetitionResource($competition));
    }

    public function destroy(Competition $competition): JsonResponse
    {
        $competition->delete();

        return response()->json(null, 204);
    }
}
