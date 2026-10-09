<?php

namespace Tests\Feature\PlayerController;

use App\Enums\Position;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_update_their_player(): void
    {
        $user = User::factory()->create();
        $team = Team::factory()->for($user)->create();
        $player = Player::factory()->for($user)->create([
            'first_name' => 'Old',
            'last_name' => 'Name',
            'nationality' => 'IT',
            'position' => Position::Defender,
            'number' => 5,
            'team_id' => null,
        ]);

        $response = $this->actingAs($user)->putJson(route('api.players.update', $player), [
            'first_name' => 'Ronaldo Luis',
            'last_name' => 'Nazario da Lima',
            'birth_date' => '1976-09-18',
            'nationality' => 'BR',
            'position' => Position::Forward->value,
            'number' => 10,
            'team_id' => $team->id,
        ]);

        $response
            ->assertOk()
            ->assertJsonPath('id', $player->id)
            ->assertJsonPath('first_name', 'Ronaldo Luis')
            ->assertJsonPath('last_name', 'Nazario da Lima')
            ->assertJsonPath('nationality', 'BR')
            ->assertJsonPath('position', Position::Forward->value)
            ->assertJsonPath('number', 10)
            ->assertJsonPath('team_id', $team->id);

        $this->assertDatabaseHas('players', [
            'id' => $player->id,
            'first_name' => 'Ronaldo Luis',
            'last_name' => 'Nazario da Lima',
            'birth_date' => '1976-09-18 00:00:00',
            'nationality' => 'BR',
            'position' => Position::Forward->value,
            'number' => 10,
            'team_id' => $team->id,
        ]);
    }

    public function test_a_user_cannot_update_a_player_they_do_not_own(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $player = Player::factory()->for($otherUser)->create(['first_name' => 'Old', 'team_id' => null]);

        $response = $this->actingAs($user)->putJson(route('api.players.update', $player), [
            'first_name' => 'New',
        ]);

        $response->assertForbidden();

        $this->assertDatabaseHas('players', [
            'id' => $player->id,
            'first_name' => 'Old',
        ]);
    }
}
