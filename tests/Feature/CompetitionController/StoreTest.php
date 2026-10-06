<?php

namespace Tests\Feature\CompetitionController;

use App\Models\Competition;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_create_a_competition(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson(route('api.competitions.store'), [
            'name' => 'Premier League',
            'description' => 'Top flight of English football',
        ]);

        $response
            ->assertCreated()
            ->assertJsonPath('name', 'Premier League')
            ->assertJsonPath('description', 'Top flight of English football')
            ->assertJsonPath('logo', null);

        $this->assertDatabaseHas('competitions', [
            'id' => $response->json('id'),
            'user_id' => $user->id,
            'name' => 'Premier League',
            'description' => 'Top flight of English football',
            'logo' => null,
        ]);
    }

    public function test_a_user_can_create_a_competition_with_a_logo(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson(route('api.competitions.store'), [
            'name' => 'Serie A',
            'logo' => UploadedFile::fake()->image('logo.png'),
        ]);

        $response->assertCreated();

        $competition = Competition::findOrFail($response->json('id'));

        $this->assertNotNull($competition->logo);
        $this->assertStringStartsWith('competitions/', $competition->logo);
        Storage::disk('public')->assertExists($competition->logo);

        $response->assertJsonPath('logo', Storage::disk('public')->url($competition->logo));
    }
}
