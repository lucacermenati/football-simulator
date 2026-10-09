<?php

namespace Tests\Feature\PlayerController;

use App\Enums\Position;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NationalitiesTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_count_their_players_per_nationality_most_common_first(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        Player::factory()->for($user)->count(3)->create(['nationality' => 'IT', 'team_id' => null]);
        Player::factory()->for($user)->count(1)->create(['nationality' => 'FR', 'team_id' => null]);
        Player::factory()->for($user)->count(2)->create(['nationality' => 'BR', 'team_id' => null]);
        Player::factory()->for($otherUser)->count(5)->create(['nationality' => 'FR', 'team_id' => null]);

        $response = $this->actingAs($user)->getJson('/api/players/nationalities');

        $response
            ->assertOk()
            ->assertExactJson([
                ['code' => 'IT', 'count' => 3],
                ['code' => 'BR', 'count' => 2],
                ['code' => 'FR', 'count' => 1],
            ]);
    }

    public function test_a_user_can_count_nationalities_of_players_matching_a_search(): void
    {
        $user = User::factory()->create();
        Player::factory()->for($user)->create(['first_name' => 'Ronaldo', 'last_name' => 'Smith', 'nationality' => 'BR', 'team_id' => null]);
        Player::factory()->for($user)->create(['first_name' => 'Cristiano', 'last_name' => 'Ronaldo', 'nationality' => 'BR', 'team_id' => null]);
        Player::factory()->for($user)->create(['first_name' => 'John', 'last_name' => 'Smith', 'nationality' => 'IT', 'team_id' => null]);

        $response = $this->actingAs($user)->getJson('/api/players/nationalities?search=ronaldo');

        $response
            ->assertOk()
            ->assertExactJson([
                ['code' => 'BR', 'count' => 2],
            ]);
    }

    public function test_a_user_can_count_nationalities_of_their_free_players(): void
    {
        $user = User::factory()->create();
        $team = Team::factory()->for($user)->create();
        Player::factory()->for($user)->create(['nationality' => 'IT', 'team_id' => null]);
        Player::factory()->for($user)->for($team)->create(['nationality' => 'FR']);

        $response = $this->actingAs($user)->getJson('/api/players/nationalities?free=1');

        $response
            ->assertOk()
            ->assertExactJson([
                ['code' => 'IT', 'count' => 1],
            ]);
    }

    public function test_a_user_can_count_nationalities_of_their_players_in_a_position(): void
    {
        $user = User::factory()->create();
        Player::factory()->for($user)->create(['nationality' => 'IT', 'position' => Position::Goalkeeper, 'team_id' => null]);
        Player::factory()->for($user)->create(['nationality' => 'FR', 'position' => Position::Forward, 'team_id' => null]);

        $response = $this->actingAs($user)->getJson('/api/players/nationalities?position=' . Position::Goalkeeper->value);

        $response
            ->assertOk()
            ->assertExactJson([
                ['code' => 'IT', 'count' => 1],
            ]);
    }

    public function test_a_user_can_count_their_players_of_a_single_nationality(): void
    {
        $user = User::factory()->create();
        Player::factory()->for($user)->count(2)->create(['nationality' => 'IT', 'team_id' => null]);
        Player::factory()->for($user)->create(['nationality' => 'FR', 'team_id' => null]);

        $response = $this->actingAs($user)->getJson('/api/players/nationalities?nationality=IT');

        $response
            ->assertOk()
            ->assertExactJson([
                ['code' => 'IT', 'count' => 2],
            ]);
    }
}
