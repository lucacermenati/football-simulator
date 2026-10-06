<?php

namespace Tests\Feature\CompetitionController;

use App\Models\Competition;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_view_their_competition(): void
    {
        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();

        $response = $this->actingAs($user)->getJson(route('api.competitions.show', $competition));

        $response
            ->assertOk()
            ->assertJsonPath('id', $competition->id)
            ->assertJsonPath('name', $competition->name)
            ->assertJsonPath('description', $competition->description);
    }

    public function test_a_user_cannot_view_a_competition_they_do_not_own(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $competition = Competition::factory()->for($otherUser)->create();

        $response = $this->actingAs($user)->getJson(route('api.competitions.show', $competition));

        $response->assertForbidden();
    }
}
