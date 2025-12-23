<?php

namespace App\Observers;

use App\Models\MatchPlayer;
use Illuminate\Support\Facades\Cache;

class MatchPlayerObserver
{
    public function created(MatchPlayer $matchPlayer): void
    {
        $this->clearCompetitionCache($matchPlayer);
    }

    public function updated(MatchPlayer $matchPlayer): void
    {
        $this->clearCompetitionCache($matchPlayer);
    }

    public function deleted(MatchPlayer $matchPlayer): void
    {
        $this->clearCompetitionCache($matchPlayer);
    }

    protected function clearCompetitionCache(MatchPlayer $matchPlayer): void
    {
        $matchPlayer->load('match');

        if ($matchPlayer->match && $matchPlayer->match->competition_id) {
            $competitionId = $matchPlayer->match->competition_id;
            Cache::forget("competition.{$competitionId}.standings");
            Cache::forget("competition.{$competitionId}.scorers");
        }
    }
}