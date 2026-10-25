<?php

namespace Tests\Feature\TeamController;

use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_view_their_team(): void
    {
        $user = User::factory()->create();
        $team = Team::factory()->for($user)->create([
            'name' => 'Inter',
            'stadium' => 'San Siro',
            'year_of_foundation' => 1908,
            'rating' => 85,
        ]);

        $response = $this->actingAs($user)->getJson(route('api.teams.show', $team));

        $response
            ->assertOk()
            ->assertJsonPath('id', $team->id)
            ->assertJsonPath('name', 'Inter')
            ->assertJsonPath('stadium', 'San Siro')
            ->assertJsonPath('year_of_foundation', 1908)
            ->assertJsonPath('rating', 85)
            ->assertJsonPath('first_color', $team->first_color)
            ->assertJsonPath('second_color', $team->second_color);
    }

    public function test_a_user_cannot_view_a_team_they_do_not_own(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $team = Team::factory()->for($otherUser)->create();

        $response = $this->actingAs($user)->getJson(route('api.teams.show', $team));

        $response->assertForbidden();
    }
}
