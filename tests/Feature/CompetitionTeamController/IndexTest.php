<?php

namespace Tests\Feature\CompetitionTeamController;

use App\Models\Competition;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_list_the_teams_of_their_competition(): void
    {
        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();
        $attached = Team::factory()->for($user)->count(2)->create();
        $notAttached = Team::factory()->for($user)->create();
        $competition->teams()->attach($attached->pluck('id'));

        $response = $this->actingAs($user)->getJson("/api/competitions/{$competition->id}/teams");

        $response
            ->assertOk()
            ->assertJsonCount(2)
            ->assertJsonFragment(['id' => $attached[0]->id])
            ->assertJsonFragment(['id' => $attached[1]->id])
            ->assertJsonMissing(['id' => $notAttached->id]);
    }

    public function test_a_user_cannot_list_the_teams_of_a_competition_they_do_not_own(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $competition = Competition::factory()->for($otherUser)->create();

        $response = $this->actingAs($user)->getJson("/api/competitions/{$competition->id}/teams");

        $response->assertForbidden();
    }
}
