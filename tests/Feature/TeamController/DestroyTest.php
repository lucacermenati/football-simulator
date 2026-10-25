<?php

namespace Tests\Feature\TeamController;

use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DestroyTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_delete_their_team(): void
    {
        $user = User::factory()->create();
        $team = Team::factory()->for($user)->create();

        $response = $this->actingAs($user)->deleteJson(route('api.teams.destroy', $team));

        $response->assertNoContent();

        $this->assertDatabaseMissing('teams', ['id' => $team->id]);
    }

    public function test_a_user_cannot_delete_a_team_they_do_not_own(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $team = Team::factory()->for($otherUser)->create();

        $response = $this->actingAs($user)->deleteJson(route('api.teams.destroy', $team));

        $response->assertForbidden();

        $this->assertDatabaseHas('teams', ['id' => $team->id]);
    }
}
