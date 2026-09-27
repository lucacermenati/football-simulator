<?php

namespace App\Queries;

use App\Models\Competition;
use App\Models\FootballMatch;
use Illuminate\Database\Eloquent\Builder;

abstract class TeamStatistics
{
    protected function statistics(?Competition $competition = null): array
    {
        return [
            'points' => $this->points($competition),
            'matches' => $this->matchesPlayed($competition),
            'goals' => $this->goalsFor($competition),
            'goals_against' => $this->goalsAgainst($competition),
            'goal_difference' => $this->goalDifference($competition),
            'win' => $this->wins($competition),
            'loss' => $this->losses($competition),
            'draw' => $this->draws($competition),
        ];
    }

    protected function teamMatches(?Competition $competition = null): Builder
    {
        return FootballMatch::query()
            ->when(
                $competition !== null,
                fn (Builder $query) => $query->where(
                    'matches.competition_id',
                    $competition->id
                ),
                fn (Builder $query) => $query->whereColumn(
                    'matches.competition_id',
                    'ct.competition_id'
                )
            )
            ->where('matches.played', true)
            ->where(fn (Builder $query) => $query
                ->whereColumn('matches.home_team_id', 'teams.id')
                ->orWhereColumn('matches.away_team_id', 'teams.id'));
    }

    protected function points(?Competition $competition = null): Builder
    {
        return $this->teamMatches($competition)->selectRaw(<<<'SQL'
            COALESCE(SUM(
                CASE
                    WHEN matches.home_team_id = teams.id AND matches.goal_home > matches.goal_away THEN 3
                    WHEN matches.away_team_id = teams.id AND matches.goal_away > matches.goal_home THEN 3
                    WHEN matches.goal_home = matches.goal_away THEN 1
                    ELSE 0
                END
            ), 0)
            SQL);
    }

    protected function matchesPlayed(?Competition $competition = null): Builder
    {
        return $this->teamMatches($competition)
            ->selectRaw('COUNT(*)');
    }

    protected function goalsFor(?Competition $competition = null): Builder
    {
        return $this->teamMatches($competition)->selectRaw(<<<'SQL'
            COALESCE(SUM(
                CASE
                    WHEN matches.home_team_id = teams.id THEN matches.goal_home
                    ELSE matches.goal_away
                END
            ), 0)
            SQL);
    }

    protected function goalsAgainst(?Competition $competition = null): Builder
    {
        return $this->teamMatches($competition)->selectRaw(<<<'SQL'
            COALESCE(SUM(
                CASE
                    WHEN matches.home_team_id = teams.id THEN matches.goal_away
                    ELSE matches.goal_home
                END
            ), 0)
            SQL);
    }

    protected function goalDifference(?Competition $competition = null): Builder
    {
        return $this->teamMatches($competition)->selectRaw(<<<'SQL'
            COALESCE(SUM(
                CASE
                    WHEN matches.home_team_id = teams.id THEN matches.goal_home - matches.goal_away
                    ELSE matches.goal_away - matches.goal_home
                END
            ), 0)
            SQL);
    }

    protected function wins(?Competition $competition = null): Builder
    {
        return $this->teamMatches($competition)
            ->selectRaw('COUNT(*)')
            ->where(fn (Builder $query) => $query
                ->whereRaw('(matches.home_team_id = teams.id AND matches.goal_home > matches.goal_away)')
                ->orWhereRaw('(matches.away_team_id = teams.id AND matches.goal_away > matches.goal_home)'));
    }

    protected function losses(?Competition $competition = null): Builder
    {
        return $this->teamMatches($competition)
            ->selectRaw('COUNT(*)')
            ->where(fn (Builder $query) => $query
                ->whereRaw('(matches.home_team_id = teams.id AND matches.goal_home < matches.goal_away)')
                ->orWhereRaw('(matches.away_team_id = teams.id AND matches.goal_away < matches.goal_home)'));
    }

    protected function draws(?Competition $competition = null): Builder
    {
        return $this->teamMatches($competition)
            ->selectRaw('COUNT(*)')
            ->whereColumn('matches.goal_home', 'matches.goal_away');
    }
}
