<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompetitionResource;
use App\Models\Competition;
use Illuminate\Http\Request;
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
            $competition->storeLogo($request->file('logo'));
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
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_logo' => 'boolean',
        ]);

        $competition->update($request->only(['name', 'description']));

        if ($request->input('remove_logo', false)) {
            $competition->removeLogo();
        }

        if ($request->hasFile('logo')) {
            $competition->storeLogo($request->file('logo'));
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

    public function standings(Competition $competition)
    {
        return Inertia::render('Competitions/Standings', [
            'competition' => $competition,
        ]);
    }

    public function scorers(Competition $competition)
    {
        return Inertia::render('Competitions/Scorers', [
            'competition' => $competition,
        ]);
    }
}
