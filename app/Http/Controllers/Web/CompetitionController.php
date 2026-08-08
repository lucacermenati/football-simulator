<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompetitionResource;
use App\Models\Competition;
use App\Queries\CompetitionStandings;
use App\Queries\CompetitionStatistics;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $competition = $request->user()->competitions()->create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

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
        return Inertia::render('Competitions/Show', [
            'competition' => $competition,
        ]);
    }

    public function update(Request $request, Competition $competition)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_logo' => 'boolean',
        ]);

        $data = Arr::except($validated, ['logo', 'remove_logo']);

        $competition->update($data);

        if ($request->input('remove_logo', false)) {
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
        $competition->delete();

        return redirect()->route('competitions.index')
            ->with('message', 'Competition deleted successfully!');
    }

    public function standings(Competition $competition, CompetitionStandings $standings)
    {
        return Inertia::render('Competitions/Standings', [
            'competition' => $competition,
            'standings' => $standings->for($competition),
        ]);
    }

    public function scorers(Competition $competition, CompetitionStatistics $statistics)
    {
        return Inertia::render('Competitions/Scorers', [
            'competition' => $competition,
            'scorers' => $statistics->for($competition)->load('team')->take(15),
        ]);
    }
}
