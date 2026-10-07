<?php

namespace Tests\Feature\TeamCompetitionController;

use App\Models\Competition;
use App\Models\FootballMatch;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_list_the_competitions_of_their_team_with_its_position(): void
    {
        $user = User::factory()->create();

        $team = Team::factory()->for($user)->create();
        $rival = Team::factory()->for($user)->create();
        $idle = Team::factory()->for($user)->create();

        $wonCompetition = Competition::factory()->for($user)->create();
        $lostCompetition = Competition::factory()->for($user)->create();
        $otherCompetition = Competition::factory()->for($user)->create();

        $wonCompetition->teams()->attach([$team->id, $rival->id, $idle->id]);
        $lostCompetition->teams()->attach([$team->id, $rival->id, $idle->id]);
        $otherCompetition->teams()->attach([$rival->id, $idle->id]);

        FootballMatch::factory()->create([
            'competition_id' => $wonCompetition->id,
            'home_team_id' => $team->id,
            'away_team_id' => $rival->id,
            'goal_home' => 3,
            'goal_away' => 1,
            'played' => true,
            'day' => 1,
        ]);

        FootballMatch::factory()->create([
            'competition_id' => $lostCompetition->id,
            'home_team_id' => $rival->id,
            'away_team_id' => $team->id,
            'goal_home' => 2,
            'goal_away' => 0,
            'played' => true,
            'day' => 1,
        ]);

        // Unplayed matches must not affect the position.
        FootballMatch::factory()->create([
            'competition_id' => $lostCompetition->id,
            'home_team_id' => $team->id,
            'away_team_id' => $idle->id,
            'goal_home' => 9,
            'goal_away' => 0,
            'played' => false,
            'day' => 2,
        ]);

        $response = $this->actingAs($user)->getJson("/api/teams/{$team->id}/competitions");

        $response
            ->assertOk()
            ->assertJsonCount(2)
            ->assertJsonFragment([
                'id' => $wonCompetition->id,
                'name' => $wonCompetition->name,
                'position' => 1,
            ])
            ->assertJsonFragment([
                'id' => $lostCompetition->id,
                'name' => $lostCompetition->name,
                'position' => 3,
            ])
            ->assertJsonMissing(['id' => $otherCompetition->id]);
    }

    public function test_a_user_cannot_list_the_competitions_of_a_team_they_do_not_own(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $team = Team::factory()->for($otherUser)->create();

        $response = $this->actingAs($user)->getJson("/api/teams/{$team->id}/competitions");

        $response->assertForbidden();
    }
}
