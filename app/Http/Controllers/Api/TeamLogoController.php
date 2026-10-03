<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadLogoRequest;
use App\Models\Team;
use Illuminate\Support\Facades\Gate;

class TeamLogoController extends Controller
{
    public function upload(UploadLogoRequest $request, Team $team)
    {
        Gate::authorize('owns', $team);

        $team->uploadFile(
            $request->file('logo'),
            'teams',
            'logo',
        );

        return response()->noContent();
    }

    public function destroy(Team $team)
    {
        Gate::authorize('owns', $team);

        $team->removeFile('logo');

        return response()->noContent();
    }
}
