<?php

namespace Tests\Feature\PlayerController;

use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_view_their_player_with_their_team(): void
    {
        $user = User::factory()->create();
        $team = Team::factory()->for($user)->create();
        $player = Player::factory()->for($user)->for($team)->create();

        $response = $this->actingAs($user)->getJson(route('api.players.show', $player));

        $response
            ->assertOk()
            ->assertJsonPath('id', $player->id)
            ->assertJsonPath('first_name', $player->first_name)
            ->assertJsonPath('last_name', $player->last_name)
            ->assertJsonPath('team.id', $team->id);
    }

    public function test_a_user_cannot_view_a_player_they_do_not_own(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $player = Player::factory()->for($otherUser)->create(['team_id' => null]);

        $response = $this->actingAs($user)->getJson(route('api.players.show', $player));

        $response->assertForbidden();
    }
}
