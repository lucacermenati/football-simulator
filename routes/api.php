<?php

use App\Http\Controllers\Api\CompetitionController;
use App\Http\Controllers\Api\FootballMatchController;
use App\Http\Controllers\Api\PlayerController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\TeamLogoController;
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
Route::post('competitions/{competition}/teams', [CompetitionController::class, 'addTeam']);
Route::delete('competitions/{competition}/teams', [CompetitionController::class, 'removeTeam']);

Route::get('competitions/{competition}/matches', [FootballMatchController::class, 'byCompetition']);
Route::post('competitions/{competition}/matches', [FootballMatchController::class, 'generateMatches']);
Route::delete('competitions/{competition}/matches', [FootballMatchController::class, 'deleteMatches']);

Route::get('competitions/{competition}/standings', [CompetitionController::class, 'standings']);
Route::get('competitions/{competition}/scorers', [CompetitionController::class, 'scorers']);

// Team routes
Route::get('teams/factory', [TeamController::class, 'factory']);
Route::post('teams/bulk', [TeamController::class, 'bulkStore']);

Route::apiResource('teams', TeamController::class);
Route::post('teams/{team}/logo', [TeamLogoController::class, 'upload']);
Route::delete('teams/{team}/logo', [TeamLogoController::class, 'delete']);
Route::get('teams/{team}/players', [PlayerController::class, 'byTeam']);
Route::get('teams/{team}/matches', [FootballMatchController::class, 'byTeam']);

// Player routes
Route::get('players/factory', [PlayerController::class, 'factory']);
Route::post('players/bulk', [PlayerController::class, 'bulkStore']);

Route::apiResource('players', PlayerController::class);
Route::post('players/{player}/team', [PlayerController::class, 'addToTeam']);
Route::delete('players/{player}/team', [PlayerController::class, 'removeFromTeam']);

// Match routes
Route::apiResource('matches', FootballMatchController::class);
Route::post('matches/{footballMatch}/simulate', [FootballMatchController::class, 'simulate']);
Route::post('matches/{footballMatch}/scorers', [FootballMatchController::class, 'addScorer']);
Route::delete('matches/{footballMatch}/scorers/{player}', [FootballMatchController::class, 'removeScorer']);