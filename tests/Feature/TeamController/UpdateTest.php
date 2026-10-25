<?php

namespace Tests\Feature\TeamController;

use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_update_their_team(): void
    {
        $user = User::factory()->create();
        $team = Team::factory()->for($user)->create([
            'name' => 'Old name',
            'stadium' => 'Old stadium',
            'year_of_foundation' => 1900,
            'rating' => 50,
            'first_color' => '#111111',
            'second_color' => '#222222',
        ]);

        $response = $this->actingAs($user)->putJson(route('api.teams.update', $team), [
            'name' => 'New name',
            'history' => 'New history',
            'stadium' => 'New stadium',
            'year_of_foundation' => 1950,
            'rating' => 75,
            'first_color' => '#AAAAAA',
            'second_color' => '#BBBBBB',
        ]);

        $response
            ->assertOk()
            ->assertJsonPath('id', $team->id)
            ->assertJsonPath('name', 'New name')
            ->assertJsonPath('history', 'New history')
            ->assertJsonPath('stadium', 'New stadium')
            ->assertJsonPath('year_of_foundation', 1950)
            ->assertJsonPath('rating', 75)
            ->assertJsonPath('first_color', '#AAAAAA')
            ->assertJsonPath('second_color', '#BBBBBB');

        $this->assertDatabaseHas('teams', [
            'id' => $team->id,
            'name' => 'New name',
            'history' => 'New history',
            'stadium' => 'New stadium',
            'year_of_foundation' => 1950,
            'rating' => 75,
            'first_color' => '#AAAAAA',
            'second_color' => '#BBBBBB',
        ]);
    }

    public function test_a_partial_update_leaves_the_other_attributes_untouched(): void
    {
        $user = User::factory()->create();
        $team = Team::factory()->for($user)->create([
            'name' => 'Old name',
            'stadium' => 'Old stadium',
            'rating' => 50,
        ]);

        $response = $this->actingAs($user)->patchJson(route('api.teams.update', $team), [
            'stadium' => 'New stadium',
        ]);

        $response
            ->assertOk()
            ->assertJsonPath('name', 'Old name')
            ->assertJsonPath('stadium', 'New stadium')
            ->assertJsonPath('rating', 50);

        $this->assertDatabaseHas('teams', [
            'id' => $team->id,
            'name' => 'Old name',
            'stadium' => 'New stadium',
            'rating' => 50,
        ]);
    }

    public function test_a_user_can_keep_the_same_name_when_updating_their_team(): void
    {
        $user = User::factory()->create();
        $team = Team::factory()->for($user)->create(['name' => 'Inter', 'stadium' => 'Old stadium']);

        $response = $this->actingAs($user)->putJson(route('api.teams.update', $team), [
            'name' => 'Inter',
            'stadium' => 'New stadium',
        ]);

        $response
            ->assertOk()
            ->assertJsonPath('name', 'Inter')
            ->assertJsonPath('stadium', 'New stadium');
    }

    public function test_a_user_cannot_rename_a_team_to_the_name_of_another_of_their_teams(): void
    {
        $user = User::factory()->create();
        Team::factory()->for($user)->create(['name' => 'Inter']);
        $team = Team::factory()->for($user)->create(['name' => 'Milan']);

        $response = $this->actingAs($user)->putJson(route('api.teams.update', $team), [
            'name' => 'Inter',
        ]);

        $response->assertUnprocessable()->assertJsonValidationErrors('name');

        $this->assertDatabaseHas('teams', ['id' => $team->id, 'name' => 'Milan']);
    }

    public function test_the_api_does_not_accept_logo_changes_on_update(): void
    {
        $user = User::factory()->create();
        $team = Team::factory()->for($user)->create(['name' => 'Inter']);

        $response = $this->actingAs($user)->putJson(route('api.teams.update', $team), [
            'name' => 'New name',
            'remove_logo' => true,
        ]);

        $response->assertUnprocessable()->assertJsonValidationErrors('remove_logo');

        $this->assertDatabaseHas('teams', ['id' => $team->id, 'name' => 'Inter', 'logo' => $team->logo]);
    }

    public function test_a_user_cannot_update_a_team_they_do_not_own(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $team = Team::factory()->for($otherUser)->create(['name' => 'Old name']);

        $response = $this->actingAs($user)->putJson(route('api.teams.update', $team), [
            'name' => 'New name',
        ]);

        $response->assertForbidden();

        $this->assertDatabaseHas('teams', ['id' => $team->id, 'name' => 'Old name']);
    }
}
