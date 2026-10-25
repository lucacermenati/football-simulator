<?php

namespace Tests\Feature\TeamPlayerController;

use App\Enums\Position;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_list_the_players_of_their_team_ordered_by_position(): void
    {
        $user = User::factory()->create();
        $team = Team::factory()->for($user)->create();
        $otherTeam = Team::factory()->for($user)->create();

        $forward = Player::factory()->for($user)->for($team)->create(['position' => Position::Forward, 'position_on_field' => 1]);
        $goalkeeper = Player::factory()->for($user)->for($team)->create(['position' => Position::Goalkeeper, 'position_on_field' => 5]);
        $secondDefender = Player::factory()->for($user)->for($team)->create(['position' => Position::Defender, 'position_on_field' => 4]);
        $firstDefender = Player::factory()->for($user)->for($team)->create(['position' => Position::Defender, 'position_on_field' => 2]);
        $midfielder = Player::factory()->for($user)->for($team)->create(['position' => Position::Midfielder, 'position_on_field' => 3]);
        $inOtherTeam = Player::factory()->for($user)->for($otherTeam)->create();

        $response = $this->actingAs($user)->getJson(route('api.teams.players.index', $team));

        $response
            ->assertOk()
            ->assertJsonCount(5)
            ->assertJsonPath('0.id', $goalkeeper->id)
            ->assertJsonPath('1.id', $firstDefender->id)
            ->assertJsonPath('2.id', $secondDefender->id)
            ->assertJsonPath('3.id', $midfielder->id)
            ->assertJsonPath('4.id', $forward->id)
            ->assertJsonMissing(['id' => $inOtherTeam->id]);
    }

    public function test_a_user_cannot_list_the_players_of_a_team_they_do_not_own(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $team = Team::factory()->for($otherUser)->create();

        $response = $this->actingAs($user)->getJson(route('api.teams.players.index', $team));

        $response->assertForbidden();
    }
}
