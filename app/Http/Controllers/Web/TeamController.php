<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'sometimes|string'
        ]);

        $teams = $request->user()->teams()
            ->when($request->input('search'), function ($query) use ($request) {
                // TODO: Implement with a searchable trait
                $query->where('name', 'like', '%' . $request->input('search') . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(16);

        return Inertia::render('Teams/Index', [
            'teams' => TeamResource::collection($teams),
        ]);
    }
}
