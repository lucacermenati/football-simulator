<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class TeamLogoController extends Controller
{
    public function upload(Request $request, Team $team): JsonResponse
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($team->logo && Storage::disk('public')->exists($team->logo)) {
            Storage::disk('public')->delete($team->logo);
        }

        $path = $request->file('logo')->store('logos', 'public');

        $team->update(['logo' => $path]);

        return response()->json(new TeamResource($team));
    }

    public function delete(Team $team): JsonResponse
    {
        if ($team->logo && Storage::disk('public')->exists($team->logo)) {
            Storage::disk('public')->delete($team->logo);
        }

        $team->update(['logo' => null]);

        return response()->json(new TeamResource($team));
    }
}
