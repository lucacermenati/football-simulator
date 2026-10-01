<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class TeamController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $request->validate([
            'search' => 'string|nullable',
            'page' => 'integer|min:1',
            'per_page' => 'integer|min:1',
        ]);

        $page = $request->input('page', 1);
        $perPage = $request->input('per_page', 15);

        $teams = $request->user()->teams()
            ->search($request->input('search', null))
            ->orderBy('created_at', 'desc')
            ->paginate($perPage, ['*'], 'page', $page);

        return TeamResource::collection($teams)->response();
    }

    public function show(Team $team): JsonResponse
    {
        Gate::authorize('owns', $team);

        return TeamResource::make($team)->response();
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:teams,name',
            'logo' => 'sometimes|file|image|max:2048',
            'first_color' => 'required|string|max:7',
            'second_color' => 'required|string|max:7',
            'year_of_foundation' => 'required|integer|min:1800|max:' . date('Y'),
            'stadium' => 'required|string|max:255',
            'rating' => 'sometimes|integer|min:30|max:100',
            'history' => 'nullable|string',
        ]);

        $team = $request->user()->teams()->create($validated);

        if($request->hasFile('logo')) {
            $team->uploadFile(
                $request->file('logo'),
                'teams',
                'logo',
            );
        }

        return TeamResource::make($team)
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function update(Request $request, Team $team): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'history' => 'nullable|string',
            'first_color' => 'nullable|string|max:7',
            'second_color' => 'nullable|string|max:7',
            'year_of_foundation' => 'nullable|integer|min:1900|max:' . date('Y'),
            'stadium' => 'nullable|string|max:255',
            'rating' => 'sometimes|integer|min:30|max:100',
        ]);

        Gate::authorize('owns', $team);

        $team->update($validated);

        return TeamResource::make($team)->response();
    }

    public function destroy(Team $team): JsonResponse
    {
        Gate::authorize('owns', $team);

        $team->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function bulkStore(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'teams' => 'required|array|min:1',
            'teams.*.name' => 'required|string|max:255|unique:teams,name',
            'teams.*.logo' => 'sometimes|string|url',
            'teams.*.first_color' => 'required|string|max:7',
            'teams.*.second_color' => 'required|string|max:7',
            'teams.*.year_of_foundation' => 'required|integer|min:1800|max:' . date('Y'),
            'teams.*.stadium' => 'required|string|max:255',
            'teams.*.rating' => 'sometimes|integer|min:30|max:100',
            'teams.*.history' => 'nullable|string',
            'teams.*.competition_id' => 'sometimes|exists:competitions,id',
        ]);

        $user = $request->user() ?? User::first();

        $createdTeams = collect($validated['teams'])->map(function ($teamData) use ($user) {
            $team = $user->teams()->create($teamData);

            if (isset($teamData['competition_id'])) {
                $team->competitions()->attach($teamData['competition_id']);
            }

            return $team;
        });

        return response()->json(TeamResource::collection($createdTeams), 201);
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