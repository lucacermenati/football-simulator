<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BearerTokenResource;
use App\Http\Resources\NextCompetitionResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return new BearerTokenResource($user->createToken('auth-token'));
    }

    public function show(Request $request)
    {
        return new UserResource($request->user());
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $user = $request->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return new UserResource($user);
    }

    public function nextToPlay(Request $request): JsonResponse
    {
        $competitions = $request->user()
            ->competitions()
            ->whereHas('matches', function ($query) {
                $query->where('played', false);
            })
            ->withMin([
                'matches as next_match_date' => function ($query) {
                    $query->where('played', false);
                }
            ], 'date')
            ->orderBy('next_match_date')
            ->paginate(3);

        return NextCompetitionResource::collection($competitions)->response();
    }
}
