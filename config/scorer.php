<?php

use App\Enums\Position;

return [
    'position_weights' => [
        Position::Goalkeeper->value => env('SCORER_GOALKEEPER_WEIGHT', 0),
        Position::Defender->value => env('SCORER_DEFENDER_WEIGHT', 10),
        Position::Midfielder->value => env('SCORER_MIDFIELDER_WEIGHT', 30),
        Position::Forward->value => env('SCORER_FORWARD_WEIGHT', 65),
    ],

    'starter_multiplier' => env('SCORER_STARTER_MULTIPLIER', 1.0),

    'substitute_multiplier' => env('SCORER_SUBSTITUTE_MULTIPLIER', 0.35),

    'minute_periods' => [
        ['min' => 1, 'max' => 45, 'weight' => 0.45],
        ['min' => 46, 'max' => 90, 'weight' => 0.45],
        ['min' => 91, 'max' => 95, 'weight' => 0.10],
    ],
];
