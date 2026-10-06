<?php

namespace Tests\Feature\CompetitionController;

use App\Models\Competition;
use App\Models\FootballMatch;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StandingsTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_view_the_standings_of_their_competition(): void
    {
        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();

        $winner = Team::factory()->for($user)->create();
        $loser = Team::factory()->for($user)->create();
        $idle = Team::factory()->for($user)->create();
        $outsider = Team::factory()->for($user)->create();

        $competition->teams()->attach([$winner->id, $loser->id, $idle->id]);

        FootballMatch::factory()->create([
            'competition_id' => $competition->id,
            'home_team_id' => $winner->id,
            'away_team_id' => $loser->id,
            'goal_home' => 3,
            'goal_away' => 1,
            'played' => true,
            'day' => 1,
        ]);

        // Unplayed matches must not count towards the standings.
        FootballMatch::factory()->create([
            'competition_id' => $competition->id,
            'home_team_id' => $loser->id,
            'away_team_id' => $idle->id,
            'goal_home' => 5,
            'goal_away' => 0,
            'played' => false,
            'day' => 1,
        ]);

        $response = $this->actingAs($user)->getJson("/api/competitions/{$competition->id}/standings");

        $response
            ->assertOk()
            ->assertJsonCount(3)
            ->assertJsonPath('0.id', $winner->id)
            ->assertJsonPath('0.points', 3)
            ->assertJsonPath('0.matches', 1)
            ->assertJsonPath('0.goals', 3)
            ->assertJsonPath('0.goals_against', 1)
            ->assertJsonPath('0.goal_difference', 2)
            ->assertJsonPath('0.win', 1)
            ->assertJsonPath('0.loss', 0)
            ->assertJsonPath('0.draw', 0)
            ->assertJsonPath('2.id', $loser->id)
            ->assertJsonPath('2.points', 0)
            ->assertJsonPath('2.matches', 1)
            ->assertJsonPath('2.goals', 1)
            ->assertJsonPath('2.goals_against', 3)
            ->assertJsonPath('2.goal_difference', -2)
            ->assertJsonPath('2.win', 0)
            ->assertJsonPath('2.loss', 1)
            ->assertJsonPath('2.draw', 0)
            ->assertJsonPath('1.id', $idle->id)
            ->assertJsonPath('1.points', 0)
            ->assertJsonPath('1.matches', 0)
            ->assertJsonMissing(['id' => $outsider->id]);
    }

    public function test_a_user_cannot_view_the_standings_of_a_competition_they_do_not_own(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $competition = Competition::factory()->for($otherUser)->create();

        $response = $this->actingAs($user)->getJson("/api/competitions/{$competition->id}/standings");

        $response->assertForbidden();
    }
}
