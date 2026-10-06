<?php

namespace Tests\Feature\CompetitionTeamController;

use App\Models\Competition;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AvailableTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_list_their_teams_not_yet_in_the_competition(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();
        $otherCompetition = Competition::factory()->for($user)->create();

        $attached = Team::factory()->for($user)->create();
        $available = Team::factory()->for($user)->create();
        $inOtherCompetition = Team::factory()->for($user)->create();
        $foreign = Team::factory()->for($otherUser)->create();

        $competition->teams()->attach($attached->id);
        $otherCompetition->teams()->attach($inOtherCompetition->id);

        $response = $this->actingAs($user)->getJson("/api/competitions/{$competition->id}/available-teams");

        $response
            ->assertOk()
            ->assertJsonCount(2, 'data')
            ->assertJsonPath('meta.per_page', 15)
            ->assertJsonFragment(['id' => $available->id])
            ->assertJsonFragment(['id' => $inOtherCompetition->id])
            ->assertJsonMissing(['id' => $attached->id])
            ->assertJsonMissing(['id' => $foreign->id]);
    }

    public function test_a_user_can_search_the_available_teams(): void
    {
        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();

        $byName = Team::factory()->for($user)->create(['name' => 'Juventus', 'stadium' => 'Allianz Stadium']);
        $byStadium = Team::factory()->for($user)->create(['name' => 'Inter', 'stadium' => 'Giuseppe Meazza']);
        Team::factory()->for($user)->create(['name' => 'Milan', 'stadium' => 'San Siro']);

        $response = $this->actingAs($user)->getJson("/api/competitions/{$competition->id}/available-teams?search=Juve");

        $response
            ->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.id', $byName->id);

        $response = $this->actingAs($user)->getJson("/api/competitions/{$competition->id}/available-teams?search=Meazza");

        $response
            ->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.id', $byStadium->id);
    }

    public function test_a_user_can_exclude_teams_from_the_available_teams(): void
    {
        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();
        [$first, $second, $third] = Team::factory()->for($user)->count(3)->create();

        $response = $this->actingAs($user)->getJson(
            "/api/competitions/{$competition->id}/available-teams?except={$first->id},{$second->id}"
        );

        $response
            ->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.id', $third->id);
    }

    public function test_a_user_cannot_list_the_available_teams_of_a_competition_they_do_not_own(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $competition = Competition::factory()->for($otherUser)->create();

        $response = $this->actingAs($user)->getJson("/api/competitions/{$competition->id}/available-teams");

        $response->assertForbidden();
    }
}
