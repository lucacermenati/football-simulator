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
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CompetitionMatchController extends Controller
{
    public function index(Request $request, Competition $competition): JsonResponse
    {
        $request->validate([
            'day' => 'nullable|integer|min:1',
        ]);

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

    public function store(Request $request, Competition $competition, CalendarGenerator $calendarGenerator)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
        ]);

        Gate::authorize('owns', $competition);

        $calendarGenerator->generateMatches($competition, $validated['start_date']);

        return response()->json(null, Response::HTTP_CREATED);
    }

    public function show(FootballMatch $footballMatch): JsonResponse
    {
        Gate::authorize('owns', $footballMatch->competition);

        $footballMatch->load(['competition', 'homeTeam', 'awayTeam', 'scorers']);

        return response()->json(new FootballMatchResource($footballMatch));
    }

    public function play(Request $request, Competition $competition, PoissonMatchSimulator $simulator, ScorerSimulator $scorerSimulator)
    {
        $validated = $request->validate([
            'match_id' => 'prohibits:day|exists:matches,id,competition_id,' . $competition->id,
            'day' => 'prohibits:match_id|exists:matches,day,competition_id,' . $competition->id,
        ]);

        Gate::authorize('owns', $competition);

        $footballMatches = $competition->matches()
            ->where('date', '<=', now())
            ->where('played', false)
            ->when(isset($validated['match_id']), function ($query) use ($validated) {
                $query->where('id', $validated['match_id']);
            })
            ->when(isset($validated['day']), function ($query) use ($validated) {
                $query->where('day', $validated['day']);
            })
            ->get();

        foreach ($footballMatches as $footballMatch) {
            $simulator->simulate($footballMatch);
            $scorerSimulator->assignScorers($footballMatch);
        }

        return response()->json(null, Response::HTTP_OK);
    }

    public function destroy(Competition $competition)
    {
        Gate::authorize('owns', $competition);

        $competition->matches()->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}