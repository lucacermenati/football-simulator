<?php

namespace App\Services;

use App\Models\FootballMatch;
use App\Models\Player;
use Illuminate\Support\Collection;

class ScorerSimulator
{
    public function assignScorers(FootballMatch $match): void
    {
        $match->scorers()->detach();

        $homeStarters = $match->homeTeam
            ->startingPlayers()
            ->get();

        $homeSubstitutes = $match->homeTeam
            ->substitutePlayers()
            ->get();

        $awayStarters = $match->awayTeam
            ->startingPlayers()
            ->get();

        $awaySubstitutes = $match->awayTeam
            ->substitutePlayers()
            ->get();

        $minutes = $this->generateUniqueMinutes(
            $match->goal_home + $match->goal_away
        );

        $minuteIndex = 0;

        for ($i = 0; $i < $match->goal_home; $i++) {
            $scorer = $this->selectScorer(
                $homeStarters,
                $homeSubstitutes
            );

            if ($scorer) {
                $match->scorers()->attach($scorer->id, [
                    'minute' => $minutes[$minuteIndex++],
                ]);
            }
        }

        for ($i = 0; $i < $match->goal_away; $i++) {
            $scorer = $this->selectScorer(
                $awayStarters,
                $awaySubstitutes
            );

            if ($scorer) {
                $match->scorers()->attach($scorer->id, [
                    'minute' => $minutes[$minuteIndex++],
                ]);
            }
        }
    }

    protected function selectScorer(
        Collection $starters,
        Collection $substitutes
    ): ?Player {
        $weightedPlayers = collect()
            ->merge(
                $this->weightedPlayers(
                    $starters,
                    config('scorer.starter_multiplier')
                )
            )
            ->merge(
                $this->weightedPlayers(
                    $substitutes,
                    config('scorer.substitute_multiplier')
                )
            )
            ->filter(
                fn (array $item) => $item['weight'] > 0
            )
            ->values();

        if ($weightedPlayers->isEmpty()) {
            return null;
        }

        return $this->weightedRandom($weightedPlayers);
    }

    protected function weightedPlayers(
        Collection $players,
        float $appearanceMultiplier
    ): Collection {
        return $players->map(
            fn (Player $player) => [
                'player' => $player,

                'weight' => $this->scorerWeight($player)
                    * $appearanceMultiplier,
            ]
        );
    }

    protected function scorerWeight(Player $player): float
    {
        return $this->positionWeight($player)
            * $this->scoringMultiplier($player);
    }

    protected function positionWeight(Player $player): float
    {
        return config(
            'scorer.position_weights.' . $player->position->value,
            0
        );
    }

    protected function scoringMultiplier(Player $player): float
    {
        $minRating = config(
            'scorer.scoring.min_rating',
            50
        );

        $maxRating = config(
            'scorer.scoring.max_rating',
            100
        );

        $minMultiplier = config(
            'scorer.scoring.min_multiplier',
            0.75
        );

        $maxMultiplier = config(
            'scorer.scoring.max_multiplier',
            1.50
        );

        $rating = max(
            $minRating,
            min($maxRating, $player->scoring)
        );

        $normalized = (
            $rating - $minRating
        ) / (
            $maxRating - $minRating
        );

        return $minMultiplier
            + (
                $normalized
                * ($maxMultiplier - $minMultiplier)
            );
    }

    protected function weightedRandom(
        Collection $weightedPlayers
    ): Player {
        $totalWeight = $weightedPlayers->sum('weight');

        $random = (
            mt_rand()
            / mt_getrandmax()
        ) * $totalWeight;

        $cumulative = 0;

        foreach ($weightedPlayers as $item) {
            $cumulative += $item['weight'];

            if ($random <= $cumulative) {
                return $item['player'];
            }
        }

        return $weightedPlayers->last()['player'];
    }

    protected function generateUniqueMinutes(int $count): array
    {
        $minutes = [];

        while (count($minutes) < $count) {
            $minute = $this->randomMinute();

            if (! in_array($minute, $minutes, true)) {
                $minutes[] = $minute;
            }
        }

        return $minutes;
    }

    protected function randomMinute(): int
    {
        $periods = config('scorer.minute_periods');

        $rand = mt_rand() / mt_getrandmax();

        $cumulative = 0;

        foreach ($periods as $period) {
            $cumulative += $period['weight'];

            if ($rand <= $cumulative) {
                return random_int(
                    $period['min'],
                    $period['max']
                );
            }
        }

        return random_int(1, 90);
    }
}
