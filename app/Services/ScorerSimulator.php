<?php

namespace App\Services;

use App\Models\FootballMatch;
use App\Models\Player;
use Illuminate\Support\Collection;

class ScorerSimulator
{
    public static function assignScorers(FootballMatch $match): void
    {
        $match->scorers()->detach();

        $homePlayers = $match->homeTeam->players;
        $awayPlayers = $match->awayTeam->players;

        $totalGoals = $match->goal_home + $match->goal_away;
        $minutes = self::generateUniqueMinutes($totalGoals);

        $minuteIndex = 0;

        for ($i = 0; $i < $match->goal_home; $i++) {
            $scorer = self::selectScorer($homePlayers);
            if ($scorer) {
                $match->scorers()->attach($scorer->id, ['minute' => $minutes[$minuteIndex++]]);
            }
        }

        for ($i = 0; $i < $match->goal_away; $i++) {
            $scorer = self::selectScorer($awayPlayers);
            if ($scorer) {
                $match->scorers()->attach($scorer->id, ['minute' => $minutes[$minuteIndex++]]);
            }
        }
    }

    protected static function selectScorer(Collection $players): ?Player
    {
        if ($players->isEmpty()) {
            return null;
        }

        $roleWeights = config('scorer.position_weights');
        $weightedPlayers = [];
        $totalWeight = 0;

        foreach ($players as $player) {
            $weight = $roleWeights[$player->position->value] ?? 0;

            if ($weight > 0) {
                $totalWeight += $weight;
                $weightedPlayers[] = [
                    'player' => $player,
                    'weight' => $weight,
                    'cumulative' => $totalWeight,
                ];
            }
        }

        if (empty($weightedPlayers) || $totalWeight <= 0) {
            return null;
        }

        $random = mt_rand() / mt_getrandmax() * $totalWeight;

        foreach ($weightedPlayers as $item) {
            if ($random <= $item['cumulative']) {
                return $item['player'];
            }
        }

        return $weightedPlayers[count($weightedPlayers) - 1]['player'];
    }

    protected static function generateUniqueMinutes(int $count): array
    {
        $minutes = [];

        while (count($minutes) < $count) {
            $minute = self::randomMinute();
            if (!in_array($minute, $minutes)) {
                $minutes[] = $minute;
            }
        }

        sort($minutes);

        return $minutes;
    }

    protected static function randomMinute(): int
    {
        $periods = config('scorer.minute_periods');

        $rand = mt_rand() / mt_getrandmax();
        $cumulative = 0.0;

        foreach ($periods as $period) {
            $cumulative += $period['weight'];
            if ($rand <= $cumulative) {
                return random_int($period['min'], $period['max']);
            }
        }

        return random_int(1, 90);
    }
}