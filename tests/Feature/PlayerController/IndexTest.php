<?php

namespace Tests\Feature\PlayerController;

use App\Enums\Position;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_list_their_own_players_newest_first_with_their_team(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $team = Team::factory()->for($user)->create();

        $oldest = Player::factory()->for($user)->for($team)->create(['created_at' => now()->subDays(2)]);
        $newest = Player::factory()->for($user)->for($team)->create(['created_at' => now()]);
        $middle = Player::factory()->for($user)->create(['team_id' => null, 'created_at' => now()->subDay()]);
        Player::factory()->for($otherUser)->create(['team_id' => null]);

        $response = $this->actingAs($user)->getJson(route('api.players.index'));

        $response
            ->assertOk()
            ->assertJsonCount(3, 'data')
            ->assertJsonPath('data.0.id', $newest->id)
            ->assertJsonPath('data.0.team.id', $team->id)
            ->assertJsonPath('data.1.id', $middle->id)
            ->assertJsonPath('data.2.id', $oldest->id);
    }

    public function test_a_user_can_paginate_their_players_sixteen_per_page(): void
    {
        $user = User::factory()->create();
        Player::factory()->for($user)->count(17)->create(['team_id' => null]);

        $firstPage = $this->actingAs($user)->getJson(route('api.players.index', ['page' => 1]));
        $secondPage = $this->actingAs($user)->getJson(route('api.players.index', ['page' => 2]));

        $firstPage
            ->assertOk()
            ->assertJsonCount(16, 'data')
            ->assertJsonPath('meta.total', 17)
            ->assertJsonPath('meta.per_page', 16)
            ->assertJsonPath('meta.current_page', 1);

        $secondPage
            ->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('meta.current_page', 2);
    }

    public function test_a_user_can_search_their_players_by_name(): void
    {
        $user = User::factory()->create();
        $byFirstName = Player::factory()->for($user)->create(['first_name' => 'Zlatan', 'last_name' => 'Smith', 'team_id' => null]);
        $byLastName = Player::factory()->for($user)->create(['first_name' => 'John', 'last_name' => 'Zlatanovic', 'team_id' => null]);
        $noMatch = Player::factory()->for($user)->create(['first_name' => 'John', 'last_name' => 'Smith', 'team_id' => null]);

        $response = $this->actingAs($user)->getJson(route('api.players.index', ['search' => 'zlatan']));

        $response
            ->assertOk()
            ->assertJsonCount(2, 'data')
            ->assertJsonFragment(['id' => $byFirstName->id])
            ->assertJsonFragment(['id' => $byLastName->id])
            ->assertJsonMissing(['id' => $noMatch->id]);
    }

    public function test_a_user_can_search_their_players_by_team_name(): void
    {
        $user = User::factory()->create();
        $matchingTeam = Team::factory()->for($user)->create(['name' => 'Juventus']);
        $otherTeam = Team::factory()->for($user)->create(['name' => 'Milan']);
        $inMatchingTeam = Player::factory()->for($user)->for($matchingTeam)->create(['first_name' => 'John', 'last_name' => 'Smith']);
        $inOtherTeam = Player::factory()->for($user)->for($otherTeam)->create(['first_name' => 'John', 'last_name' => 'Smith']);
        $free = Player::factory()->for($user)->create(['first_name' => 'John', 'last_name' => 'Smith', 'team_id' => null]);

        $response = $this->actingAs($user)->getJson(route('api.players.index', ['search' => 'juve']));

        $response
            ->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(['id' => $inMatchingTeam->id])
            ->assertJsonMissing(['id' => $inOtherTeam->id])
            ->assertJsonMissing(['id' => $free->id]);
    }

    public function test_a_user_can_list_only_their_free_players(): void
    {
        $user = User::factory()->create();
        $team = Team::factory()->for($user)->create();
        $free = Player::factory()->for($user)->create(['team_id' => null]);
        $inTeam = Player::factory()->for($user)->for($team)->create();

        $response = $this->actingAs($user)->getJson(route('api.players.index', ['free' => 1]));

        $response
            ->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(['id' => $free->id])
            ->assertJsonMissing(['id' => $inTeam->id]);
    }

    public function test_a_user_can_filter_their_players_by_position(): void
    {
        $user = User::factory()->create();
        $goalkeeper = Player::factory()->for($user)->create(['position' => Position::Goalkeeper, 'team_id' => null]);
        $forward = Player::factory()->for($user)->create(['position' => Position::Forward, 'team_id' => null]);

        $response = $this->actingAs($user)->getJson(route('api.players.index', ['position' => Position::Goalkeeper->value]));

        $response
            ->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(['id' => $goalkeeper->id])
            ->assertJsonMissing(['id' => $forward->id]);
    }

    public function test_a_user_can_filter_their_players_by_nationality(): void
    {
        $user = User::factory()->create();
        $italian = Player::factory()->for($user)->create(['nationality' => 'IT', 'team_id' => null]);
        $french = Player::factory()->for($user)->create(['nationality' => 'FR', 'team_id' => null]);

        $response = $this->actingAs($user)->getJson(route('api.players.index', ['nationality' => 'IT']));

        $response
            ->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(['id' => $italian->id])
            ->assertJsonMissing(['id' => $french->id]);
    }
}
