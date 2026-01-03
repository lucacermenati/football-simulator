<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CompetitionController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Competitions/Index', [
            'competitions' => $request->user()->competitions,
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
            $path = $request->file('logo')->store('competitions', 'public');
            $competition->update(['logo' => "/" . $path]);
        }

        return redirect()->back()->with('message', 'Competition created successfully!');
    }

    public function show(Competition $competition)
    {
        return Inertia::render('Competitions/Show', [
            'competition' => $competition,
        ]);
    }
}
