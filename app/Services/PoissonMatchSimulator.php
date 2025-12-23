<?php

namespace App\Services;

use App\Models\FootballMatch;

class PoissonMatchSimulator
{
    public static function simulate(FootballMatch $match): void
    {
        $config = config('simulator.poisson');
        $homeTeam = $match->homeTeam;
        $awayTeam = $match->awayTeam;

        $ratingMicroVarianceHome = random_int($config['micro_variance']['min'], $config['micro_variance']['max']);
        $ratingMicroVarianceAway = random_int($config['micro_variance']['min'], $config['micro_variance']['max']);
        $randomEventHome = self::randomEvent();
        $randomEventAway = self::randomEvent();

        $homeRating = $homeTeam->rating + $ratingMicroVarianceHome + $randomEventHome + config('simulator.poisson.home_advantage');
        $awayRating = $awayTeam->rating + $ratingMicroVarianceAway + $randomEventAway;

        $deltaRating = abs($homeRating - $awayRating);

        $g0  = (float) $config['expected_goals']['g0'];
        $div = (float) $config['expected_goals']['delta_divisor'];

        $lamMin = (float) $config['expected_goals']['min'];
        $lamMax = (float) $config['expected_goals']['max'];

        $lambdaHome = self::clamp($g0 + ($deltaRating / $div), $lamMin, $lamMax);
        $lambdaAway = self::clamp($g0 - ($deltaRating / $div), $lamMin, $lamMax);

        // Sample goals
        $homeGoals = self::poissonSample($lambdaHome);
        $awayGoals = self::poissonSample($lambdaAway);

        $match->goal_home = $homeGoals;
        $match->goal_away = $awayGoals;
        $match->played = true;

        $match->save();
    }

    /**
     * Sample a Poisson(λ) random integer using Knuth's algorithm.
     * Works very well for small/moderate λ
     */
    public static function poissonSample(float $lambda): int
    {
        if ($lambda <= 0.0) {
            return 0;
        }

        $L = exp(-$lambda);
        $k = 0;
        $p = 1.0;

        do {
            $k++;
            $u = (mt_rand() + 1) / (mt_getrandmax() + 2);
            $p *= $u;
        } while ($p > $L);

        return $k - 1;
    }

    public static function randomEvent()
    {
        $config = config('simulator.poisson.random_event');
        $randomNumber = random_int(0, 1);

        if ($randomNumber < $config['good']) {
            return $config['advantage'];
        }

        if ($randomNumber < $config['good'] + $config['bad']) {
            return -$config['advantage'];
        }

        return 0;
    }

    public static function clamp($value, $min, $max)
    {
        return max(min($value, $max), $min);
    }
}
