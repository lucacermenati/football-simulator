<?php

namespace App\Providers;

use App\Models\FootballMatch;
use App\Models\MatchPlayer;
use App\Observers\FootballMatchObserver;
use App\Observers\MatchPlayerObserver;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        JsonResource::withoutWrapping();
        
        FootballMatch::observe(FootballMatchObserver::class);
        MatchPlayer::observe(MatchPlayerObserver::class);
    }
}
