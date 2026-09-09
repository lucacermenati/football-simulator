<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CompetitionLogoController extends Controller
{
    public function upload(Request $request, Competition $competition)
    {
        $request->validate([
            'logo' => 'required|image|max:2048',
        ]);

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