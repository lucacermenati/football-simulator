<?php

namespace Tests\Feature\CompetitionController;

use App\Models\Competition;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DestroyTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_delete_their_competition(): void
    {
        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();

        $response = $this->actingAs($user)->deleteJson(route('api.competitions.destroy', $competition));

        $response->assertNoContent();

        $this->assertDatabaseMissing('competitions', ['id' => $competition->id]);
    }

    public function test_a_user_cannot_delete_a_competition_they_do_not_own(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $competition = Competition::factory()->for($otherUser)->create();

        $response = $this->actingAs($user)->deleteJson(route('api.competitions.destroy', $competition));

        $response->assertForbidden();

        $this->assertDatabaseHas('competitions', ['id' => $competition->id]);
    }
}
