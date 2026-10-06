<?php

namespace Tests\Feature\CompetitionLogoController;

use App\Models\Competition;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_upload_a_logo_for_their_competition(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create(['logo' => null]);

        $response = $this->actingAs($user)->postJson("/api/competitions/{$competition->id}/logo", [
            'logo' => UploadedFile::fake()->image('logo.png'),
        ]);

        $response->assertNoContent();

        $competition->refresh();

        $this->assertNotNull($competition->logo);
        $this->assertStringStartsWith('competitions/', $competition->logo);
        Storage::disk('public')->assertExists($competition->logo);
    }

    public function test_uploading_a_new_logo_replaces_the_existing_one(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $oldLogo = UploadedFile::fake()->image('old.png')->store('competitions', 'public');
        $competition = Competition::factory()->for($user)->create(['logo' => $oldLogo]);

        $response = $this->actingAs($user)->postJson("/api/competitions/{$competition->id}/logo", [
            'logo' => UploadedFile::fake()->image('new.png'),
        ]);

        $response->assertNoContent();

        $competition->refresh();

        $this->assertNotSame($oldLogo, $competition->logo);
        Storage::disk('public')->assertMissing($oldLogo);
        Storage::disk('public')->assertExists($competition->logo);
    }

    public function test_a_user_cannot_upload_a_logo_for_a_competition_they_do_not_own(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $competition = Competition::factory()->for($otherUser)->create(['logo' => null]);

        $response = $this->actingAs($user)->postJson("/api/competitions/{$competition->id}/logo", [
            'logo' => UploadedFile::fake()->image('logo.png'),
        ]);

        $response->assertForbidden();

        $this->assertNull($competition->refresh()->logo);
        $this->assertEmpty(Storage::disk('public')->allFiles());
    }
}
