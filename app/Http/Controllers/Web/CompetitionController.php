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
}
