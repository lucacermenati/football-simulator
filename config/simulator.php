<?php

return [

    'poisson' => [

        /*
        |--------------------------------------------------------------------------
        | Home Advantage
        |--------------------------------------------------------------------------
        |
        | Bonus added to the home team's rating before calculating expected goals.
        |
        | Meaning:
        | - Simulates the advantage of playing at home: crowd, familiarity,
        |   less travel fatigue, referee pressure, confidence, etc.
        |
        | Effect:
        | - Higher value: home teams win more often and score slightly more.
        | - Lower value: home and away matches become more neutral.
        |
        | Example:
        | - If home_advantage = 2, a home team rated 70 behaves roughly like 72.
        |
        */

        'home_advantage' => env('SIMULATOR_POISSON_HOME_ADVANTAGE', 2),

        /*
        |--------------------------------------------------------------------------
        | Micro Variance
        |--------------------------------------------------------------------------
        |
        | Small random rating adjustment applied independently to both teams
        | before each match.
        |
        | Meaning:
        | - Simulates daily form: motivation, small injuries, tiredness,
        |   tactical feeling, pressure, weather adaptation, etc.
        |
        | Effect:
        | - Wider range: more unpredictable results.
        | - Narrower range: ratings become more stable and reliable.
        |
        | Example:
        | - min -2 / max +2 means a team rated 70 may play that match
        |   like a team rated between 68 and 72.
        |
        */

        'micro_variance' => [
            'min' => env('SIMULATOR_POISSON_STATE_OF_FORM_MIN', -2),
            'max' => env('SIMULATOR_POISSON_STATE_OF_FORM_MAX', +2),
        ],

        /*
        |--------------------------------------------------------------------------
        | Random Events
        |--------------------------------------------------------------------------
        |
        | Occasional bigger positive or negative rating swing.
        |
        | Meaning:
        | - Simulates unusual match events that affect performance:
        |   red cards, tactical collapse, early injury, lucky momentum,
        |   goalkeeper disasterclass, inspired performance, etc.
        |
        | Effect:
        | - Higher "good" chance: more surprise overperformances.
        | - Higher "bad" chance: more surprise underperformances.
        | - Higher "advantage": random events become more decisive.
        | - Lower "advantage": random events become softer.
        |
        | Example:
        | - good = 0.10, bad = 0.10, advantage = 5
        | - Each team has:
        |   10% chance to play at +5 rating,
        |   10% chance to play at -5 rating,
        |   80% chance to have no major event.
        |
        */

        'random_event' => [
            'good' => env('SIMULATOR_POISSON_RANDOM_EVENT_GOOD_CHANCE', 0.1),
            'bad' => env('SIMULATOR_POISSON_RANDOM_EVENT_BAD_CHANCE', 0.1),
            'advantage' => env('SIMULATOR_POISSON_RANDOM_EVENT_ADVANTAGE', 5),
        ],

        /*
        |--------------------------------------------------------------------------
        | Expected Goals Formula
        |--------------------------------------------------------------------------
        |
        | These values control how team ratings are translated into expected goals.
        |
        | Formula used by the simulator:
        |
        | home λ = g0 + (deltaRating / delta_divisor)
        | away λ = g0 - (deltaRating / delta_divisor)
        |
        | Where:
        | - λ is the expected goals value used by the Poisson sampler.
        | - g0 is the neutral expected goals per team.
        | - deltaRating is homeRating - awayRating.
        | - delta_divisor controls how strongly rating difference affects goals.
        |
        */

        'expected_goals' => [

            /*
            |--------------------------------------------------------------------------
            | Base Expected Goals - g0
            |--------------------------------------------------------------------------
            |
            | Average expected goals per team in a balanced match.
            |
            | Meaning:
            | - If two teams are equal after all rating modifiers, both teams
            |   start from this expected goals value.
            |
            | Effect:
            | - Higher g0: more goals overall, more 2-2, 3-2, 4-1 results.
            | - Lower g0: fewer goals overall, more 0-0, 1-0, 1-1 results.
            |
            | Example:
            | - g0 = 1.1 means an even match starts around:
            |   home λ = 1.1
            |   away λ = 1.1
            |
            | Important:
            | - This controls the scoring environment of your whole universe.
            | - It does not make ratings more important; it mainly changes
            |   how many goals are produced.
            |
            */

            'g0' => env('SIMULATOR_POISSON_EXPECTED_GOALS_G0', 1.1),

            /*
            |--------------------------------------------------------------------------
            | Delta Divisor
            |--------------------------------------------------------------------------
            |
            | Divides the rating difference before adding/subtracting it from g0.
            |
            | Meaning:
            | - Controls how much the stronger team's rating advantage affects
            |   expected goals.
            |
            | Effect:
            | - Lower divisor: rating difference matters more.
            |   Strong teams dominate more often.
            |
            | - Higher divisor: rating difference matters less.
            |   Results become more random and balanced.
            |
            | Example:
            | - deltaRating = 11
            |
            |   With divisor 22:
            |   rating effect = 11 / 22 = 0.5
            |   stronger team gets +0.5 expected goals
            |   weaker team gets -0.5 expected goals
            |
            |   With divisor 11:
            |   rating effect = 11 / 11 = 1.0
            |   stronger team gets +1.0 expected goals
            |   weaker team gets -1.0 expected goals
            |
            */

            'delta_divisor' => env('SIMULATOR_POISSON_EXPECTED_GOALS_DELTA_DIVISOR', 22),

            /*
            |--------------------------------------------------------------------------
            | Minimum Expected Goals
            |--------------------------------------------------------------------------
            |
            | Lower bound for λ after the formula is calculated.
            |
            | Meaning:
            | - Prevents very weak teams from having almost no chance to score.
            |
            | Effect:
            | - Higher min: underdogs score more often.
            | - Lower min: mismatches become harsher and weak teams can be
            |   almost completely shut out.
            |
            | Example:
            | - min = 0.15 means even a much weaker team still has a small
            |   scoring chance.
            |
            */

            'min' => env('SIMULATOR_POISSON_EXPECTED_GOALS_MIN', 0.15),

            /*
            |--------------------------------------------------------------------------
            | Maximum Expected Goals
            |--------------------------------------------------------------------------
            |
            | Upper bound for λ after the formula is calculated.
            |
            | Meaning:
            | - Prevents very strong teams from producing absurdly high expected
            |   goals too often.
            |
            | Effect:
            | - Higher max: more huge wins, more 5-0, 6-1, 7-2 type results.
            | - Lower max: fewer extreme scorelines.
            |
            | Example:
            | - max = 2.5 means even a dominant team is capped at 2.5 expected
            |   goals before the Poisson draw.
            |
            */

            'max' => env('SIMULATOR_POISSON_EXPECTED_GOALS_MAX', 2.5),
        ],
    ],
];
