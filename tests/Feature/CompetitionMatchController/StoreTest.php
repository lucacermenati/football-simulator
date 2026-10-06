<?php

namespace Tests\Feature\CompetitionMatchController;

use App\Models\Competition;
use App\Models\FootballMatch;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_generate_the_calendar_of_their_competition(): void
    {
        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();
        $teams = Team::factory()->for($user)->count(4)->create();
        $competition->teams()->attach($teams->pluck('id'));

        $response = $this->actingAs($user)->postJson("/api/competitions/{$competition->id}/matches", [
            'start_date' => '2026-09-05',
        ]);

        $response->assertCreated();

        $matches = $competition->matches()->get();

        // Double round robin: every team plays every other team twice.
        $this->assertCount(12, $matches);
        $this->assertSame([1, 2, 3, 4, 5, 6], $matches->pluck('day')->unique()->sort()->values()->all());
        $this->assertTrue($matches->groupBy('day')->every(fn ($dayMatches) => $dayMatches->count() === 2));
        $this->assertTrue($matches->every(fn (FootballMatch $match) => ! $match->played));

        foreach ($teams as $home) {
            foreach ($teams as $away) {
                if ($home->is($away)) {
                    continue;
                }

                $this->assertSame(1, $matches
                    ->where('home_team_id', $home->id)
                    ->where('away_team_id', $away->id)
                    ->count());
            }
        }

        $this->assertSame('2026-09-05', $matches->where('day', 1)->first()->date->toDateString());
        $this->assertSame('2026-10-10', $matches->where('day', 6)->first()->date->toDateString());
    }

    public function test_generating_the_calendar_again_replaces_the_existing_matches(): void
    {
        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();
        $teams = Team::factory()->for($user)->count(2)->create();
        $competition->teams()->attach($teams->pluck('id'));

        $stale = FootballMatch::factory()->create([
            'competition_id' => $competition->id,
            'home_team_id' => $teams[0]->id,
            'away_team_id' => $teams[1]->id,
            'day' => 1,
            'played' => true,
        ]);

        $response = $this->actingAs($user)->postJson("/api/competitions/{$competition->id}/matches", [
            'start_date' => '2026-09-05',
        ]);

        $response->assertCreated();

        $this->assertDatabaseMissing('matches', ['id' => $stale->id]);
        $this->assertSame(2, $competition->matches()->count());
    }

    public function test_a_user_cannot_generate_the_calendar_of_a_competition_they_do_not_own(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $competition = Competition::factory()->for($otherUser)->create();
        $teams = Team::factory()->for($otherUser)->count(2)->create();
        $competition->teams()->attach($teams->pluck('id'));

        $response = $this->actingAs($user)->postJson("/api/competitions/{$competition->id}/matches", [
            'start_date' => '2026-09-05',
        ]);

        $response->assertForbidden();

        $this->assertSame(0, $competition->matches()->count());
    }
}
