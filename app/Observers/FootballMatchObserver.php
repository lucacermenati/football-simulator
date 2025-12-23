<?php

namespace App\Observers;

use App\Models\FootballMatch;
use Illuminate\Support\Facades\Cache;

class FootballMatchObserver
{
    public function updated(FootballMatch $match): void
    {
        $this->clearCompetitionCache($match);
    }

    public function deleted(FootballMatch $match): void
    {
        $this->clearCompetitionCache($match);
    }

    protected function clearCompetitionCache(FootballMatch $match): void
    {
        if ($match->competition_id) {
            Cache::forget("competition.{$match->competition_id}.standings");
            Cache::forget("competition.{$match->competition_id}.scorers");
        }
    }
}
