<?php

use App\Enums\Position;

return [
    'position_weights' => [
        Position::Goalkeeper->value => env('SCORER_GOALKEEPER_WEIGHT', 0),
        Position::Defender->value => env('SCORER_DEFENDER_WEIGHT', 1),
        Position::Midfielder->value => env('SCORER_MIDFIELDER_WEIGHT', 4),
        Position::Forward->value => env('SCORER_FORWARD_WEIGHT', 10),
    ],

    'starter_multiplier' => env('SCORER_STARTER_MULTIPLIER', 1.0),

    'substitute_multiplier' => env('SCORER_SUBSTITUTE_MULTIPLIER', 0.30),

    'scoring' => [
        'min_rating' => env('SCORER_MIN_RATING', 50),
        'max_rating' => env('SCORER_MAX_RATING', 100),

        'min_multiplier' => env(
            'SCORER_MIN_SCORING_MULTIPLIER',
            0.75
        ),

        'max_multiplier' => env(
            'SCORER_MAX_SCORING_MULTIPLIER',
            1.50
        ),
    ],

    'minute_periods' => [
        ['min' => 1, 'max' => 45, 'weight' => 0.45],
        ['min' => 46, 'max' => 90, 'weight' => 0.45],
        ['min' => 91, 'max' => 95, 'weight' => 0.10],
    ],
];