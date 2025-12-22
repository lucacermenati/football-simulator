<?php

use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\FootballMatchController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
|
*/

// Competition routes
Route::apiResource('competitions', CompetitionController::class);
Route::get('competitions/{competition}/matches', [FootballMatchController::class, 'byCompetition']);
Route::post('competitions/{competition}/teams', [CompetitionController::class, 'addTeam']);
Route::delete('competitions/{competition}/teams', [CompetitionController::class, 'removeTeam']);

// Team routes
Route::get('teams/factory', [TeamController::class, 'factory']);

Route::apiResource('teams', TeamController::class);
Route::get('teams/{team}/players', [PlayerController::class, 'byTeam']);
Route::get('teams/{team}/matches', [FootballMatchController::class, 'byTeam']);

// Player routes
Route::apiResource('players', PlayerController::class);

// Match routes
Route::apiResource('matches', FootballMatchController::class);
Route::post('matches/{footballMatch}/scorers', [FootballMatchController::class, 'addScorer']);
Route::delete('matches/{footballMatch}/scorers/{player}', [FootballMatchController::class, 'removeScorer']);
