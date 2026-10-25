<?php

namespace App\Queries;

use App\Models\Competition;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CompetitionMatchDay
{
    /**
     * The matches of one day, paginated so that the page is the day and the last page is the last day.
     */
    public function for(Competition $competition, ?int $day = null): LengthAwarePaginator
    {
        $page = $day;
        $perPage = max(intdiv($competition->teams()->count(), 2), 1);
        $lastPage = $competition->matches()->max('day');

        // Fallback to first unplayed day if no day is specified
        if (!$page) {
            $page = $competition->matches()
                ->where('played', false)
                ->min('day');
        }

        // Fallback to last match day if the day is greater than the max day
        if ($page > $lastPage) {
            $page = $lastPage;
        }

        return $competition->matches()
            ->with(['homeTeam', 'awayTeam', 'scorers'])
            ->orderBy('day')
            ->paginate($perPage, ['*'], 'day', $page);
    }
}
