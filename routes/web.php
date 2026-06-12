<?php

use App\Http\Controllers\Web\CompetitionController;
use App\Http\Controllers\Web\CompetitionMatchController;
use App\Http\Controllers\Web\CompetitionTeamController;
use App\Http\Controllers\Web\PlayerController;
use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Web\TeamCompetitionController;
use App\Http\Controllers\Web\TeamController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('welcome');

Route::middleware('auth')->group(function () {
    /* PROFILE */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* COMPETITIONS */
    Route::get('/competitions', [CompetitionController::class, 'index'])->name('competitions.index');
    Route::post('/competitions', [CompetitionController::class, 'store'])->name('competitions.store');
    Route::get('/competitions/{competition}', [CompetitionController::class, 'show'])->name('competitions.show');
    Route::post('/competitions/{competition}', [CompetitionController::class, 'update'])->name('competitions.update');
    Route::delete('/competitions/{competition}', [CompetitionController::class, 'destroy'])->name('competitions.destroy');
    // COMPETITIONS Sub routes
    Route::get('/competitions/{competition}/standings', [CompetitionController::class, 'standings'])->name('competitions.standings');
    Route::get('/competitions/{competition}/scorers', [CompetitionController::class, 'scorers'])->name('competitions.scorers');

    Route::get('/competitions/{competition}/matches', [CompetitionMatchController::class, 'index'])->name('competitions.matches.index');
    Route::post('/competitions/{competition}/matches', [CompetitionMatchController::class, 'generate'])->name('competitions.matches.generate');
    Route::get('/competitions/{competition}/teams', [CompetitionTeamController::class, 'index'])->name('competitions.teams.index');
    Route::post('/competitions/{competition}/teams', [CompetitionTeamController::class, 'add'])->name('competitions.teams.add');
    Route::delete('/competitions/{competition}/teams/{team}', [CompetitionTeamController::class, 'destroy'])->name('competitions.teams.destroy');

    /* TEAMS */
    Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
    Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
    Route::post('/teams/{team}', [TeamController::class, 'update'])->name('teams.update');
    Route::delete('/teams/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');
    // TEAMS Sub routes
    Route::get('/teams/{team}/info', [TeamController::class, 'info'])->name('teams.info');
    Route::get('/teams/{team}/players', [TeamController::class, 'players'])->name('teams.players');
    // TEAMS Competition routes
    Route::post('/teams/{team}/competitions', [TeamCompetitionController::class, 'store'])->name('teams.competition.store');

    /* PLAYERS */
    Route::get('/players', [PlayerController::class, 'index'])->name('players.index');
});

require __DIR__.'/auth.php';