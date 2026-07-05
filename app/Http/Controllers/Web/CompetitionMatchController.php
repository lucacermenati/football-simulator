<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\FootballMatch;
use App\Services\CalendarGenerator;
use Carbon\Carbon;
use Inertia\Inertia;

class CompetitionMatchController extends Controller
{
    public function index(Request $request, Competition $competition)
    {
        $day = $request->input('day', null);
        $maxDay = $competition->matches()->max('day');

        // Fallback to first unplayed match if no day is specified
        if (!$day) {
            $day = $competition->matches()
                ->where('played', false)
                ->min('day');
        }

        // Fallback to last day if the day is greater than the max day
        if ($day > $maxDay) {
            return redirect()->route('competitions.matches.index', [
                'competition' => $competition->id,
                'day' => $maxDay
            ]);
        }

        $matches = $competition->matches()
            ->with(['homeTeam', 'awayTeam'])
            ->where('day', $day)
            ->get();

        return Inertia::render('Competitions/Matches', [
            'competition' => $competition,
            'matches' => $matches,
            'day' => $day,
            'maxDay' => $maxDay
        ]);
    }

    public function show(Competition $competition, FootballMatch $match)
    {
        $match->load(['homeTeam', 'awayTeam', 'scorers']);

        return Inertia::render('Competitions/Match', [
            'competition' => $competition,
            'match' => $match,
        ]);
    }

    public function generate(Request $request, Competition $competition, CalendarGenerator $calendarGenerator)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            // 'start_date' => 'required|date|after_or_equal:' . Carbon::now()->format('Y-m-d'),
        ]);

        // TODO: Add error handling: the user does not own the competition, the matches are already generated

        $calendarGenerator->generateMatches($competition, $validated['start_date']);

        return redirect()->back()->with('success', 'Matches generated successfully');
    }
}
