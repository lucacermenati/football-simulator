<?php

namespace App\Services;

use App\Models\Competition;
use Carbon\Carbon;
use InvalidArgumentException;
use Str;

class CalendarGenerator
{
    public static function generateMatches(Competition $competition, string|Carbon $startDate)
    {
        $startDate = $startDate instanceof Carbon ? $startDate : Carbon::parse($startDate);
        $competition->matches()->delete();
        $teams = $competition->teams->shuffle()->values();
        $n = $teams->count();

        if ($n < 2 || $n % 2 !== 0) {
            throw new InvalidArgumentException("Circle method requires an even number of teams (got {$n}).");
        }

        $rounds = $n - 1;
        $matchesPerRound = $n / 2;

        $matches = [];

        for ($round = 0; $round < $rounds; $round++) {
            for ($match = 0; $match < $matchesPerRound; $match++) {
                $home = $teams[$match];
                $away = $teams[$n - $match - 1];

                // Alternate home and away games
                if ($round % 2 === 1) {
                    [$home, $away] = [$away, $home];
                }

                $matches[] = [
                    'id' => Str::uuid(),
                    'home_team_id' => $home->id,
                    'away_team_id' => $away->id,
                    'competition_id' => $competition->id,
                    'date' => $startDate->copy()->addWeeks($round),
                ];
            }

            // Rotate teams except the pivot
            $last = $teams->pop();
            $teams->splice(1, 0, [$last]);
            $teams = $teams->values();
        }

        // Add second leg
        foreach ($matches as $match) {
            $matches[] = [
                'id' => Str::uuid(),
                'home_team_id' => $match['away_team_id'],
                'away_team_id' => $match['home_team_id'],
                'competition_id' => $competition->id,
                'date' => $match['date']->copy()->addWeeks($rounds),
            ];
        }

        return $matches;
    }
}
