<?php

namespace Tests\Feature\PlayerController;

use App\Models\Player;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DestroyTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_delete_their_player(): void
    {
        $user = User::factory()->create();
        $player = Player::factory()->for($user)->create(['team_id' => null]);

        $response = $this->actingAs($user)->deleteJson(route('api.players.destroy', $player));

        $response->assertNoContent();

        $this->assertDatabaseMissing('players', ['id' => $player->id]);
    }

    public function test_a_user_cannot_delete_a_player_they_do_not_own(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $player = Player::factory()->for($otherUser)->create(['team_id' => null]);

        $response = $this->actingAs($user)->deleteJson(route('api.players.destroy', $player));

        $response->assertForbidden();

        $this->assertDatabaseHas('players', ['id' => $player->id]);
    }
}
