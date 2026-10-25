<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndexCompetitionMatchRequest;
use App\Http\Resources\FootballMatchResource;
use App\Models\Competition;
use App\Models\FootballMatch;
use App\Queries\CompetitionMatchDay;
use App\Services\CalendarGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class CompetitionMatchController extends Controller
{
    public function index(IndexCompetitionMatchRequest $request, Competition $competition, CompetitionMatchDay $matchDay)
    {
        Gate::authorize('owns', $competition);

        $matches = $matchDay->for($competition, $request->filled('day') ? $request->integer('day') : null);

        return Inertia::render('Competitions/Matches', [
            'competition' => $competition,
            'matches' => FootballMatchResource::collection($matches->getCollection()),
            'day' => $matches->isNotEmpty() ? $matches->currentPage() : null,
            'maxDay' => $matches->isNotEmpty() ? $matches->lastPage() : null,
        ]);
    }

    public function show(Competition $competition, FootballMatch $match)
    {
        Gate::authorize('owns', $competition);

        $match->load(['homeTeam', 'awayTeam', 'scorers']);

        return Inertia::render('Competitions/Match', [
            'competition' => $competition,
            'match' => $match,
        ]);
    }

    public function store(Request $request, Competition $competition, CalendarGenerator $calendarGenerator)
    {
        Gate::authorize('owns', $competition);

        $validated = $request->validate([
            'start_date' => 'required|date',
        ]);

        $calendarGenerator->generateMatches($competition, $validated['start_date']);

        return redirect()->back()->with('success', 'Matches generated successfully');
    }
}
