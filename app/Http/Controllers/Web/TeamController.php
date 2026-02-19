<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $teams = $request->user()->teams()
            ->orderBy('created_at', 'desc')
            ->paginate(16);

        return Inertia::render('Teams/Index', [
            'teams' => TeamResource::collection($teams),
        ]);
    }
}
