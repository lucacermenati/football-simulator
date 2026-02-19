<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Competition;
use Inertia\Inertia;

class CompetitionTeamController extends Controller
{
    public function index(Request $request, Competition $competition)
    {
        $competition->loadMissing('teams');

        return Inertia::render('Competitions/Teams', [
            'competition' => $competition,
        ]);
    }
}
