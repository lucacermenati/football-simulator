<?php

namespace Tests\Unit\Services;

use App\Models\Competition;
use App\Models\Team;
use App\Models\User;
use App\Services\CalendarGenerator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use InvalidArgumentException;
use Tests\TestCase;

class CalendarGeneratorTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_generates_a_double_round_robin_calendar(): void
    {
        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();
        $teams = Team::factory()->for($user)->count(4)->create();
        $competition->teams()->attach($teams->pluck('id'));

        CalendarGenerator::generateMatches($competition, '2026-09-05');

        $matches = $competition->matches()->get();

        // 4 teams: 6 days, 2 matches per day, every team plays once per day.
        $this->assertCount(12, $matches);
        $this->assertSame([1, 2, 3, 4, 5, 6], $matches->pluck('day')->unique()->sort()->values()->all());

        foreach ($matches->groupBy('day') as $dayMatches) {
            $playing = $dayMatches->pluck('home_team_id')->merge($dayMatches->pluck('away_team_id'));

            $this->assertSame($teams->pluck('id')->sort()->values()->all(), $playing->sort()->values()->all());
        }
    }

    public function test_it_rejects_an_odd_number_of_teams(): void
    {
        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();
        $teams = Team::factory()->for($user)->count(3)->create();
        $competition->teams()->attach($teams->pluck('id'));

        $this->expectException(InvalidArgumentException::class);

        CalendarGenerator::generateMatches($competition, '2026-09-05');
    }
}
