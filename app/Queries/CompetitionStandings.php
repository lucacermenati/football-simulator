<?php

namespace App\Queries;

use App\Models\Competition;
use App\Models\FootballMatch;
use App\Models\Team;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class CompetitionStandings
{
    /**
     * @return Collection<int, Team>
     */
    public function for(Competition $competition): Collection
    {
        return Team::query()
            ->whereHas('competitions', fn (Builder $query) => $query->whereKey($competition->id))
            ->addSelect([
                'id' => 'teams.id',
                'name' => 'teams.name',
                'logo' => 'teams.logo',
                'first_color' => 'teams.first_color',
                'second_color' => 'teams.second_color',
                'points' => $this->points($competition),
                'matches' => $this->matchesPlayed($competition),
                'goals' => $this->goalsFor($competition),
                'goals_against' => $this->goalsAgainst($competition),
                'goal_difference' => $this->goalDifference($competition),
                'win' => $this->wins($competition),
                'loss' => $this->losses($competition),
                'draw' => $this->draws($competition),
            ])
            ->orderByDesc('points')
            ->orderByDesc('goal_difference')
            ->orderByDesc('goals')
            ->get();
    }

    private function teamMatches(Competition $competition): Builder
    {
        return FootballMatch::query()
            ->where('matches.competition_id', $competition->id)
            ->where('matches.played', true)
            ->where(fn (Builder $query) => $query
                ->whereColumn('matches.home_team_id', 'teams.id')
                ->orWhereColumn('matches.away_team_id', 'teams.id'));
    }

    private function points(Competition $competition): Builder
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

    private function matchesPlayed(Competition $competition): Builder
    {
        return $this->teamMatches($competition)->selectRaw('COUNT(*)');
    }

    private function goalsFor(Competition $competition): Builder
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

    private function goalsAgainst(Competition $competition): Builder
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

    private function goalDifference(Competition $competition): Builder
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

    private function wins(Competition $competition): Builder
    {
        return $this->teamMatches($competition)
            ->selectRaw('COUNT(*)')
            ->where(fn (Builder $query) => $query
                ->whereRaw('(matches.home_team_id = teams.id AND matches.goal_home > matches.goal_away)')
                ->orWhereRaw('(matches.away_team_id = teams.id AND matches.goal_away > matches.goal_home)'));
    }

    private function losses(Competition $competition): Builder
    {
        return $this->teamMatches($competition)
            ->selectRaw('COUNT(*)')
            ->where(fn (Builder $query) => $query
                ->whereRaw('(matches.home_team_id = teams.id AND matches.goal_home < matches.goal_away)')
                ->orWhereRaw('(matches.away_team_id = teams.id AND matches.goal_away < matches.goal_home)'));
    }

    private function draws(Competition $competition): Builder
    {
        return $this->teamMatches($competition)
            ->selectRaw('COUNT(*)')
            ->whereColumn('matches.goal_home', 'matches.goal_away');
    }
}
