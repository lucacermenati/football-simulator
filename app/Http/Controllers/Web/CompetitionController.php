<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompetitionRequest;
use App\Http\Requests\UpdateCompetitionRequest;
use App\Http\Resources\CompetitionResource;
use App\Models\Competition;
use App\Queries\CompetitionStandings;
use App\Queries\CompetitionStatistics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class CompetitionController extends Controller
{
    public function index(Request $request)
    {
        $competitions = $request->user()->competitions()
            ->orderBy('created_at', 'desc')
            ->paginate(11);

        return Inertia::render('Competitions/Index', [
            'competitions' => CompetitionResource::collection($competitions),
        ]);
    }

    public function store(StoreCompetitionRequest $request)
    {
        $competition = $request->user()->competitions()->create($request->safe()->except('logo'));

        if ($request->hasFile('logo')) {
            $competition->uploadFile(
                $request->file('logo'),
                'competitions',
                'logo',
            );
        }

        return redirect()->back()
            ->with('message', 'Competition created successfully!');
    }

    public function show(Competition $competition)
    {
        Gate::authorize('owns', $competition);

        return Inertia::render('Competitions/Show', [
            'competition' => $competition,
        ]);
    }

    public function update(UpdateCompetitionRequest $request, Competition $competition)
    {
        Gate::authorize('owns', $competition);

        $competition->update($request->safe()->except(['logo', 'remove_logo']));

        if ($request->boolean('remove_logo')) {
            $competition->removeFile('logo');
        }

        if ($request->hasFile('logo')) {
            $competition->uploadFile(
                $request->file('logo'),
                'competitions',
                'logo',
            );
        }

        return redirect()->back()
            ->with('message', 'Competition updated successfully!');
    }

    public function destroy(Competition $competition)
    {
        Gate::authorize('owns', $competition);

        $competition->delete();

        return redirect()->route('competitions.index')
            ->with('message', 'Competition deleted successfully!');
    }

    public function standings(Competition $competition, CompetitionStandings $standings)
    {
        Gate::authorize('owns', $competition);

        return Inertia::render('Competitions/Standings', [
            'competition' => $competition,
            'standings' => $standings->for($competition),
        ]);
    }

    public function scorers(Competition $competition, CompetitionStatistics $statistics)
    {
        Gate::authorize('owns', $competition);

        return Inertia::render('Competitions/Scorers', [
            'competition' => $competition,
            'scorers' => $statistics->for($competition)->load('team')->take(15),
        ]);
    }
}
