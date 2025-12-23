<?php

use App\Enums\Role;

return [
    'role_weights' => [
        Role::Goalkeeper->value => env('SCORER_GOALKEEPER_WEIGHT', 0),
        Role::Defender->value => env('SCORER_DEFENDER_WEIGHT', 10),
        Role::Midfielder->value => env('SCORER_MIDFIELDER_WEIGHT', 30),
        Role::Forward->value => env('SCORER_FORWARD_WEIGHT', 65),
    ],

    'minute_periods' => [
        ['min' => 1, 'max' => 45, 'weight' => 0.45],
        ['min' => 46, 'max' => 90, 'weight' => 0.45],
        ['min' => 91, 'max' => 95, 'weight' => 0.10],
    ],
];
