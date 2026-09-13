<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FootballMatchResource;
use App\Models\Competition;
use App\Models\FootballMatch;
use App\Services\CalendarGenerator;
use App\Services\PoissonMatchSimulator;
use App\Services\ScorerSimulator;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class FootballMatchController extends Controller
{
    public function index(Request $request, Competition $competition): JsonResponse
    {
        $page = $request->input('day', null);
        $perPage = $competition->teams()->count() / 2;
        $lastPage = $competition->matches()->max('day');

        // Fallback to first unplayed day if no day is specified
        if (!$page) {
            $page = $competition->matches()
                ->where('played', false)
                ->min('day');
        }

        // Fallback to last match day if the day is greater than the max day
        if ($page > $lastPage) {
            $page = $lastPage;
        }

        $matches = $competition->matches()
            ->with(['homeTeam', 'awayTeam', 'scorers'])
            ->orderBy('day')
            ->paginate($perPage, ['*'], 'page', $page);

        return FootballMatchResource::collection($matches)->response();
    }

    public function show(FootballMatch $footballMatch): JsonResponse
    {
        $footballMatch->load(['competition', 'homeTeam', 'awayTeam', 'scorers']);

        return response()->json(new FootballMatchResource($footballMatch));
    }

    public function generateMatches(Request $request, Competition $competition)
    {
        $validated = $request->validate([
            'start_date' => 'sometimes|date',
        ]);

        $startDate = $validated['start_date'] ?? now();

        $success = CalendarGenerator::generateMatches($competition, $startDate);

        if (!$success) {
            return response()->json(['error' => 'Failed to generate matches'], 500);
        }

        $matches = $competition->matches()
            ->with(['awayTeam', 'homeTeam'])
            ->orderBy('date')
            ->get();

        return response()->json(FootballMatchResource::collection($matches));
    }

    public function simulate(FootballMatch $footballMatch, PoissonMatchSimulator $simulator, ScorerSimulator $scorerSimulator)
    {
        $simulator->simulate($footballMatch);
        $scorerSimulator->assignScorers($footballMatch);

        $footballMatch->load(['scorers']);

        return response()->json(new FootballMatchResource($footballMatch));
    }
}