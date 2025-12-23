<?php

return [
    'poisson' => [
        'home_advantage' => env('SIMULATOR_POISSON_HOME_ADVANTAGE', 2),
        'micro_variance' => [
            'min' => env('SIMULATOR_POISSON_STATE_OF_FORM_MIN', -2),
            'max' => env('SIMULATOR_POISSON_STATE_OF_FORM_MAX', +2),
        ],
        'random_event' => [
            'good' => env('SIMULATOR_POISSON_RANDOM_EVENT_GOOD_CHANCE', 0.1),
            'bad' => env('SIMULATOR_POISSON_RANDOM_EVENT_BAD_CHANCE', 0.1),
            'advantage' => env('SIMULATOR_POISSON_RANDOM_EVENT_ADVANTAGE', 5),
        ],
        'expected_goals' => [
            'g0' => env('SIMULATOR_POISSON_EXPECTED_GOALS_G0', 1.25),
            'delta_divisor' => env('SIMULATOR_POISSON_EXPECTED_GOALS_DELTA_DIVISOR', 20),
            'min' => env('SIMULATOR_POISSON_EXPECTED_GOALS_MIN', 0.15),
            'max' => env('SIMULATOR_POISSON_EXPECTED_GOALS_MAX', 3.5),
        ],
    ],
];