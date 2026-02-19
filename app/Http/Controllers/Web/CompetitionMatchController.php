<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Competition;
use Inertia\Inertia;

class CompetitionMatchController extends Controller
{
    public function index(Request $request, Competition $competition)
    {
        $competition->loadMissing('matches');

        return Inertia::render('Competitions/Matches', [
            'competition' => $competition,
        ]);
    }
}