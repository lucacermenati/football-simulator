<?php

use App\Http\Controllers\Api\CompetitionController;
use App\Http\Controllers\Api\CompetitionLogoController;
use App\Http\Controllers\Api\CompetitionTeamController;
use App\Http\Controllers\Api\TokenController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
|
*/

Route::name('api.')->group(function () {
    Route::post('/token', [TokenController::class, 'store'])->name('token.store');
    Route::post('/register', [UserController::class, 'store'])->name('register');

    Route::middleware('auth:sanctum')->group(function () {
        Route::delete('/token', [TokenController::class, 'destroy'])->name('token.destroy');
        Route::get('/user', [UserController::class, 'show'])->name('user.show');

        Route::apiResource('competitions', CompetitionController::class);
        Route::get('/competitions/{competition}/standings', [CompetitionController::class, 'standings']);
        Route::get('/competitions/{competition}/statistics', [CompetitionController::class, 'statistics']);

        Route::post('/competitions/{competition}/logo', [CompetitionLogoController::class, 'upload']);
        Route::delete('/competitions/{competition}/logo', [CompetitionLogoController::class, 'destroy']);

        Route::apiResource('competitions.teams', CompetitionTeamController::class)->only('index', 'store');
        Route::delete('/competitions/{competition}/teams', [CompetitionTeamController::class, 'destroy']);
        Route::get('/competitions/{competition}/available-teams', [CompetitionTeamController::class, 'available']);
    });
});

// Route::get('competitions/{competition}/matches', [FootballMatchController::class, 'byCompetition']);
// Route::post('competitions/{competition}/matches', [FootballMatchController::class, 'generateMatches']);
// Route::delete('competitions/{competition}/matches', [FootballMatchController::class, 'deleteMatches']);

// Route::get('competitions/{competition}/standings', [CompetitionController::class, 'standings']);
// Route::get('competitions/{competition}/scorers', [CompetitionController::class, 'scorers']);

// // Team routes
// Route::get('teams/factory', [TeamController::class, 'factory']);
// Route::post('teams/bulk', [TeamController::class, 'bulkStore']);

// Route::apiResource('teams', TeamController::class);
// Route::post('teams/{team}/logo', [TeamLogoController::class, 'upload']);
// Route::delete('teams/{team}/logo', [TeamLogoController::class, 'delete']);
// Route::get('teams/{team}/players', [PlayerController::class, 'byTeam']);
// Route::get('teams/{team}/matches', [FootballMatchController::class, 'byTeam']);

// // Player routes
// Route::get('players/factory', [PlayerController::class, 'factory']);
// Route::post('players/bulk', [PlayerController::class, 'bulkStore']);

// Route::apiResource('players', PlayerController::class);
// Route::post('players/{player}/team', [PlayerController::class, 'addToTeam']);
// Route::delete('players/{player}/team', [PlayerController::class, 'removeFromTeam']);

// // Match routes
// Route::apiResource('matches', FootballMatchController::class);
// Route::post('matches/{footballMatch}/simulate', [FootballMatchController::class, 'simulate']);
// Route::post('matches/{footballMatch}/scorers', [FootballMatchController::class, 'addScorer']);
// Route::delete('matches/{footballMatch}/scorers/{player}', [FootballMatchController::class, 'removeScorer']);
