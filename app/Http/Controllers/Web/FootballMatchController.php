<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\FootballMatch;
use App\Services\PoissonMatchSimulator;
use App\Services\ScorerSimulator;
use Illuminate\Http\Request;

class FootballMatchController extends Controller
{
    public function simulate(
        Request $request,
        FootballMatch $match,
        PoissonMatchSimulator $matchSimulator,
        ScorerSimulator $scorerSimulator
    ) {
        $matchSimulator->simulate($match);
        $scorerSimulator->assignScorers($match);

        return redirect()->back()->with('success', 'Match simulated successfully');
    }
}
