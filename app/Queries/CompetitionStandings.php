<?php

namespace App\Queries;

use App\Models\Competition;
use App\Models\Team;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class CompetitionStandings extends TeamStatistics
{
    public function for(Competition $competition): Collection
    {
        return Team::query()
            ->whereHas(
                'competitions',
                fn (Builder $query) => $query->whereKey($competition->id)
            )
            ->select([
                'teams.id',
                'teams.name',
                'teams.logo',
                'teams.first_color',
                'teams.second_color',
            ])
            ->addSelect($this->statistics($competition))
            ->orderByDesc('points')
            ->orderByDesc('goal_difference')
            ->orderByDesc('goals')
            ->orderBy('teams.id')
            ->get();
    }
}
