<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndexCompetitionMatchRequest;
use App\Http\Resources\FootballMatchResource;
use App\Models\Competition;
use App\Models\FootballMatch;
use App\Queries\CompetitionMatchDay;
use App\Services\CalendarGenerator;
use App\Services\PoissonMatchSimulator;
use App\Services\ScorerSimulator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CompetitionMatchController extends Controller
{
    public function index(IndexCompetitionMatchRequest $request, Competition $competition, CompetitionMatchDay $matchDay): JsonResponse
    {
        Gate::authorize('owns', $competition);

        $matches = $matchDay->for($competition, $request->filled('day') ? $request->integer('day') : null);

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

    public function show(Competition $competition, FootballMatch $match)
    {
        Gate::authorize('owns', $competition);

        $match->load(['competition', 'homeTeam', 'awayTeam', 'scorers']);

        return response()->json(new FootballMatchResource($match));
    }

    public function play(Request $request, Competition $competition, PoissonMatchSimulator $simulator, ScorerSimulator $scorerSimulator)
    {
        $validated = $request->validate([
            'match_id' => 'prohibits:day|exists:matches,id,competition_id,'.$competition->id,
            'day' => 'prohibits:match_id|exists:matches,day,competition_id,'.$competition->id,
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

    public function reset(Competition $competition)
    {
        Gate::authorize('owns', $competition);

        $competition->matches()->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
