<?php

use App\Http\Controllers\Web\CompetitionController;
use App\Http\Controllers\Web\PlayerController;
use App\Http\Controllers\Web\ProfileController;
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

    /* TEAMS */
    Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');

    /* PLAYERS */
    Route::get('/players', [PlayerController::class, 'index'])->name('players.index');
});

require __DIR__.'/auth.php';