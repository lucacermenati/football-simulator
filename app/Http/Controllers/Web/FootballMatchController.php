<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\FootballMatch;
use App\Services\PoissonMatchSimulator;
use App\Services\ScorerSimulator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FootballMatchController extends Controller
{
    public function simulate(
        FootballMatch $match,
        PoissonMatchSimulator $matchSimulator,
        ScorerSimulator $scorerSimulator
    ) {
        Gate::authorize('owns', $match->competition);

        $matchSimulator->simulate($match);
        $scorerSimulator->assignScorers($match);

        return redirect()->back()->with('success', 'Match simulated successfully');
    }
}
