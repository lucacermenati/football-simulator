<?php

namespace Tests\Feature\TeamLogoController;

use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_upload_a_logo_for_their_team(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $team = Team::factory()->for($user)->create(['logo' => null]);

        $response = $this->actingAs($user)->postJson("/api/teams/{$team->id}/logo", [
            'logo' => UploadedFile::fake()->image('logo.png'),
        ]);

        $response->assertNoContent();

        $team->refresh();

        $this->assertNotNull($team->logo);
        $this->assertStringStartsWith('teams/', $team->logo);
        Storage::disk('public')->assertExists($team->logo);
    }

    public function test_uploading_a_new_logo_replaces_the_existing_one(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $oldLogo = UploadedFile::fake()->image('old.png')->store('teams', 'public');
        $team = Team::factory()->for($user)->create(['logo' => $oldLogo]);

        $response = $this->actingAs($user)->postJson("/api/teams/{$team->id}/logo", [
            'logo' => UploadedFile::fake()->image('new.png'),
        ]);

        $response->assertNoContent();

        $team->refresh();

        $this->assertNotSame($oldLogo, $team->logo);
        Storage::disk('public')->assertMissing($oldLogo);
        Storage::disk('public')->assertExists($team->logo);
    }

    public function test_a_user_cannot_upload_a_logo_for_a_team_they_do_not_own(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $team = Team::factory()->for($otherUser)->create(['logo' => null]);

        $response = $this->actingAs($user)->postJson("/api/teams/{$team->id}/logo", [
            'logo' => UploadedFile::fake()->image('logo.png'),
        ]);

        $response->assertForbidden();

        $this->assertNull($team->refresh()->logo);
        $this->assertEmpty(Storage::disk('public')->allFiles());
    }
}
