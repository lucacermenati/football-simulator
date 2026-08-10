<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use App\Models\Competition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\JsonResponse;

class CompetitionTeamController extends Controller
{
    public function index(Competition $competition): JsonResponse
    {
        Gate::authorize('owns', $competition);

        return TeamResource::collection($competition->teams)->response();
    }
}
