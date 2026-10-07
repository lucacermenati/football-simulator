<?php

namespace Tests\Feature\TeamCompetitionController;

use App\Models\Competition;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AvailableTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_list_their_competitions_the_team_is_not_yet_in(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $team = Team::factory()->for($user)->create();
        $otherTeam = Team::factory()->for($user)->create();

        $joined = Competition::factory()->for($user)->create();
        $available = Competition::factory()->for($user)->create();
        $withOtherTeam = Competition::factory()->for($user)->create();
        $foreign = Competition::factory()->for($otherUser)->create();

        $joined->teams()->attach($team->id);
        $withOtherTeam->teams()->attach($otherTeam->id);

        $response = $this->actingAs($user)->getJson("/api/teams/{$team->id}/available-competitions");

        $response
            ->assertOk()
            ->assertJsonCount(2, 'data')
            ->assertJsonPath('meta.per_page', 15)
            ->assertJsonFragment(['id' => $available->id])
            ->assertJsonFragment(['id' => $withOtherTeam->id])
            ->assertJsonMissing(['id' => $joined->id])
            ->assertJsonMissing(['id' => $foreign->id]);
    }

    public function test_a_user_can_search_the_available_competitions(): void
    {
        $user = User::factory()->create();
        $team = Team::factory()->for($user)->create();

        $serieA = Competition::factory()->for($user)->create(['name' => 'Serie A']);
        Competition::factory()->for($user)->create(['name' => 'Premier League']);

        $response = $this->actingAs($user)->getJson("/api/teams/{$team->id}/available-competitions?search=Serie");

        $response
            ->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.id', $serieA->id);
    }

    public function test_a_user_cannot_list_the_available_competitions_of_a_team_they_do_not_own(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $team = Team::factory()->for($otherUser)->create();

        $response = $this->actingAs($user)->getJson("/api/teams/{$team->id}/available-competitions");

        $response->assertForbidden();
    }
}
