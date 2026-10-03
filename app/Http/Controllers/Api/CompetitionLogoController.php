<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadLogoRequest;
use App\Models\Competition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CompetitionLogoController extends Controller
{
    public function upload(UploadLogoRequest $request, Competition $competition)
    {
        Gate::authorize('owns', $competition);

        $competition->uploadFile(
            $request->file('logo'),
            'competitions',
            'logo',
        );

        return response()->noContent();
    }

    public function destroy(Request $request, Competition $competition)
    {
        Gate::authorize('owns', $competition);

        $competition->removeFile('logo');

        return response()->noContent();
    }
}
