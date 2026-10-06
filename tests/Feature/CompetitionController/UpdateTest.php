<?php

namespace Tests\Feature\CompetitionController;

use App\Models\Competition;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_update_their_competition(): void
    {
        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create([
            'name' => 'Old name',
            'description' => 'Old description',
        ]);

        $response = $this->actingAs($user)->putJson(route('api.competitions.update', $competition), [
            'name' => 'New name',
            'description' => 'New description',
        ]);

        $response
            ->assertOk()
            ->assertJsonPath('id', $competition->id)
            ->assertJsonPath('name', 'New name')
            ->assertJsonPath('description', 'New description');

        $this->assertDatabaseHas('competitions', [
            'id' => $competition->id,
            'name' => 'New name',
            'description' => 'New description',
        ]);
    }

    public function test_a_user_cannot_update_a_competition_they_do_not_own(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $competition = Competition::factory()->for($otherUser)->create(['name' => 'Old name']);

        $response = $this->actingAs($user)->putJson(route('api.competitions.update', $competition), [
            'name' => 'New name',
        ]);

        $response->assertForbidden();

        $this->assertDatabaseHas('competitions', [
            'id' => $competition->id,
            'name' => 'Old name',
        ]);
    }
}
