<?php

namespace App\Queries;

use App\Models\Competition;
use App\Models\MatchPlayer;
use App\Models\Player;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class CompetitionStatistics
{
    public function for(Competition $competition): Collection
    {
        return Player::query()
            ->whereHas('matches', function ($query) use ($competition) {
                $query->where('matches.competition_id', $competition->id);
            })
            ->addSelect([
                'goals' => MatchPlayer::query()
                    ->selectRaw('COUNT(*)')
                    ->whereHas('match', fn (Builder $query) => $query->where('competition_id', $competition->id))
                    ->whereColumn('player_id', 'players.id')
            ])
            ->orderBy('goals', 'desc')
            ->get();
    }
}