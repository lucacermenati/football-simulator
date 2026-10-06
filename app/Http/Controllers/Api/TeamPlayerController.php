<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlayerResource;
use App\Models\Team;
use Illuminate\Support\Facades\Gate;

class TeamPlayerController extends Controller
{
    public function index (Team $team)
    {
        Gate::authorize('owns', $team);

        return PlayerResource::collection($team->players()->orderByPosition()->get());
    }
}