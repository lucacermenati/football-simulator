<?php

namespace Tests\Feature\CompetitionController;

use App\Models\Competition;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_list_their_own_competitions_newest_first(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();

        $oldest = Competition::factory()->for($user)->create(['created_at' => now()->subDays(2)]);
        $newest = Competition::factory()->for($user)->create(['created_at' => now()]);
        $middle = Competition::factory()->for($user)->create(['created_at' => now()->subDay()]);
        Competition::factory()->for($otherUser)->create();

        $response = $this->actingAs($user)->getJson(route('api.competitions.index'));

        $response
            ->assertOk()
            ->assertJsonCount(3, 'data')
            ->assertJsonPath('data.0.id', $newest->id)
            ->assertJsonPath('data.1.id', $middle->id)
            ->assertJsonPath('data.2.id', $oldest->id);
    }

    public function test_a_user_can_paginate_their_competitions(): void
    {
        $user = User::factory()->create();
        Competition::factory()->for($user)->count(3)->create();

        $firstPage = $this->actingAs($user)->getJson(route('api.competitions.index', ['per_page' => 2, 'page' => 1]));
        $secondPage = $this->actingAs($user)->getJson(route('api.competitions.index', ['per_page' => 2, 'page' => 2]));

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
}
