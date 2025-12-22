<?php

namespace App\Services;

use App\Models\Competition;
use Carbon\Carbon;

class CalendarGenerator
{
    public static function generateMatches(Competition $competition, string|Carbon $startDate)
    {
        $startDate = $startDate instanceof Carbon ? $startDate : Carbon::parse($startDate);
        $teams = $competition->teams;
        // Ensure even number of teams
        if ($teams->count() % 2 !== 0) {
            throw new \InvalidArgumentException('Number of teams must be even');
        }

        $teams = $teams->shuffle();
        $halfCount = $teams->count() / 2;

        $firstHalf = $teams->slice(0, $halfCount);
        $secondHalf = $teams->slice($halfCount);
        $matches = [];

        foreach ($firstHalf as $roundIndex => $homeTeam) {
            foreach ($secondHalf as $awayTeam) {
                $matches[] = [
                    'competition_id' => $competition->id,
                    'home_team_id' => $homeTeam->id,
                    'away_team_id' => $awayTeam->id,
                    'date' => $startDate->copy()->addWeeks($roundIndex),
                ];
            }

            $secondHalf = $secondHalf->rotate();
        }

        return $matches;
    }
}
