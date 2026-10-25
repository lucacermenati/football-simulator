<?php

namespace Tests\Feature\TeamController;

use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_create_a_team(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson(route('api.teams.store'), [
            'name' => 'Inter',
            'history' => 'Founded by a group of dissidents from Milan.',
            'stadium' => 'San Siro',
            'year_of_foundation' => 1908,
            'rating' => 85,
            'first_color' => '#0000FF',
            'second_color' => '#000000',
        ]);

        $response
            ->assertCreated()
            ->assertJsonPath('name', 'Inter')
            ->assertJsonPath('history', 'Founded by a group of dissidents from Milan.')
            ->assertJsonPath('stadium', 'San Siro')
            ->assertJsonPath('year_of_foundation', 1908)
            ->assertJsonPath('rating', 85)
            ->assertJsonPath('first_color', '#0000FF')
            ->assertJsonPath('second_color', '#000000')
            ->assertJsonPath('logo', null);

        $this->assertDatabaseHas('teams', [
            'id' => $response->json('id'),
            'user_id' => $user->id,
            'name' => 'Inter',
            'stadium' => 'San Siro',
            'year_of_foundation' => 1908,
            'rating' => 85,
            'first_color' => '#0000FF',
            'second_color' => '#000000',
            'logo' => null,
        ]);
    }

    public function test_a_user_can_create_a_team_with_a_logo(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson(route('api.teams.store'), [
            'name' => 'Inter',
            'first_color' => '#0000FF',
            'second_color' => '#000000',
            'logo' => UploadedFile::fake()->image('logo.png'),
        ]);

        $response->assertCreated();

        $team = Team::findOrFail($response->json('id'));

        $this->assertNotNull($team->logo);
        $this->assertStringStartsWith('teams/', $team->logo);
        Storage::disk('public')->assertExists($team->logo);

        $response->assertJsonPath('logo', asset('storage/'.$team->logo));
    }

    public function test_two_users_can_create_a_team_with_the_same_name(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        Team::factory()->for($otherUser)->create(['name' => 'Inter']);

        $response = $this->actingAs($user)->postJson(route('api.teams.store'), [
            'name' => 'Inter',
            'first_color' => '#0000FF',
            'second_color' => '#000000',
        ]);

        $response->assertCreated();

        $this->assertDatabaseHas('teams', [
            'id' => $response->json('id'),
            'user_id' => $user->id,
            'name' => 'Inter',
        ]);
    }
}
