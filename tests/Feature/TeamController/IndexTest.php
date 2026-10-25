<?php

namespace Tests\Feature\TeamController;

use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_list_their_own_teams_newest_first(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();

        $oldest = Team::factory()->for($user)->create(['created_at' => now()->subDays(2)]);
        $newest = Team::factory()->for($user)->create(['created_at' => now()]);
        $middle = Team::factory()->for($user)->create(['created_at' => now()->subDay()]);
        Team::factory()->for($otherUser)->create();

        $response = $this->actingAs($user)->getJson(route('api.teams.index'));

        $response
            ->assertOk()
            ->assertJsonCount(3, 'data')
            ->assertJsonPath('data.0.id', $newest->id)
            ->assertJsonPath('data.1.id', $middle->id)
            ->assertJsonPath('data.2.id', $oldest->id);
    }

    public function test_a_user_can_paginate_their_teams(): void
    {
        $user = User::factory()->create();
        Team::factory()->for($user)->count(3)->create();

        $firstPage = $this->actingAs($user)->getJson(route('api.teams.index', ['per_page' => 2, 'page' => 1]));
        $secondPage = $this->actingAs($user)->getJson(route('api.teams.index', ['per_page' => 2, 'page' => 2]));

        $firstPage
            ->assertOk()
            ->assertJsonCount(2, 'data')
            ->assertJsonPath('meta.total', 3)
            ->assertJsonPath('meta.per_page', 2)
            ->assertJsonPath('meta.current_page', 1);

        $secondPage
            ->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('meta.current_page', 2);
    }

    public function test_a_user_can_search_their_teams_by_name_or_stadium(): void
    {
        $user = User::factory()->create();
        $byName = Team::factory()->for($user)->create(['name' => 'Juventus', 'stadium' => 'Allianz Stadium']);
        $byStadium = Team::factory()->for($user)->create(['name' => 'Torino', 'stadium' => 'Stadio Juventus Vecchio']);
        $noMatch = Team::factory()->for($user)->create(['name' => 'Milan', 'stadium' => 'San Siro']);

        $response = $this->actingAs($user)->getJson(route('api.teams.index', ['search' => 'juve']));

        $response
            ->assertOk()
            ->assertJsonCount(2, 'data')
            ->assertJsonFragment(['id' => $byName->id])
            ->assertJsonFragment(['id' => $byStadium->id])
            ->assertJsonMissing(['id' => $noMatch->id]);
    }

    public function test_a_user_can_sort_their_teams_ascending(): void
    {
        $user = User::factory()->create();
        $charlie = Team::factory()->for($user)->create(['name' => 'Charlie']);
        $alpha = Team::factory()->for($user)->create(['name' => 'Alpha']);
        $bravo = Team::factory()->for($user)->create(['name' => 'Bravo']);

        $response = $this->actingAs($user)->getJson(route('api.teams.index', ['sort' => 'name']));

        $response
            ->assertOk()
            ->assertJsonPath('data.0.id', $alpha->id)
            ->assertJsonPath('data.1.id', $bravo->id)
            ->assertJsonPath('data.2.id', $charlie->id);
    }

    public function test_a_user_can_sort_their_teams_descending(): void
    {
        $user = User::factory()->create();
        $weak = Team::factory()->for($user)->create(['rating' => 40]);
        $strong = Team::factory()->for($user)->create(['rating' => 90]);
        $average = Team::factory()->for($user)->create(['rating' => 65]);

        $response = $this->actingAs($user)->getJson(route('api.teams.index', ['sort' => '-rating']));

        $response
            ->assertOk()
            ->assertJsonPath('data.0.id', $strong->id)
            ->assertJsonPath('data.1.id', $average->id)
            ->assertJsonPath('data.2.id', $weak->id);
    }
}
