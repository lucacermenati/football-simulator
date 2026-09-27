<?php

namespace App\Queries;

use App\Models\Competition;
use App\Models\Team;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class TeamPositions extends TeamStatistics
{
    public function for(Team $team): Collection
    {
        // Build standings for all team/competition combinations.
        $standings = Team::query()
            ->join(
                'competitions_teams as ct',
                'ct.team_id',
                '=',
                'teams.id'
            )
            ->select([
                'ct.competition_id',
                'teams.id as team_id',
            ])
            ->addSelect($this->statistics());

        // Assign each team a position within its competition.
        $ranking = DB::query()
            ->fromSub($standings, 'standings')
            ->selectRaw(<<<'SQL'
                standings.competition_id,
                standings.team_id,

                ROW_NUMBER() OVER (
                    PARTITION BY standings.competition_id
                    ORDER BY
                        standings.points DESC,
                        standings.goal_difference DESC,
                        standings.goals DESC,
                        standings.team_id ASC
                ) AS position
                SQL);

        // Extract the requested team's position for each competition.
        $position = DB::query()
            ->fromSub($ranking, 'ranking')
            ->select('ranking.position')
            ->whereColumn(
                'ranking.competition_id',
                'competitions.id'
            )
            ->where('ranking.team_id', $team->id)
            ->limit(1);

        // Retrieve the team's competitions with their calculated position.
        return Competition::query()
            ->whereHas(
                'teams',
                fn ($query) => $query->whereKey($team->id)
            )
            ->select([
                'competitions.id',
                'competitions.name',
                'competitions.logo',
            ])
            ->addSelect([
                'team_position' => $position,
            ])
            ->get();
    }
}