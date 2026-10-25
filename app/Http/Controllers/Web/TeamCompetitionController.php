<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class TeamCompetitionController extends Controller
{
    public function store(Request $request, Team $team)
    {
        $request->validate([
            'competition_id' => [
                'required',
                Rule::exists('competitions', 'id')
                    ->where('user_id', $request->user()->id),
            ],
        ]);

        Gate::authorize('owns', $team);

        $team->competitions()->syncWithoutDetaching($request->competition_id);

        return redirect()->back()->with('success', 'Team added to competition successfully');
    }
}
