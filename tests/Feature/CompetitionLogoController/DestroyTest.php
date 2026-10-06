<?php

namespace Tests\Feature\CompetitionLogoController;

use App\Models\Competition;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class DestroyTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_remove_the_logo_of_their_competition(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $logo = UploadedFile::fake()->image('logo.png')->store('competitions', 'public');
        $competition = Competition::factory()->for($user)->create(['logo' => $logo]);

        $response = $this->actingAs($user)->deleteJson("/api/competitions/{$competition->id}/logo");

        $response->assertNoContent();

        $this->assertNull($competition->refresh()->logo);
        Storage::disk('public')->assertMissing($logo);
    }

    public function test_removing_the_logo_of_a_competition_without_one_succeeds(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create(['logo' => null]);

        $response = $this->actingAs($user)->deleteJson("/api/competitions/{$competition->id}/logo");

        $response->assertNoContent();

        $this->assertNull($competition->refresh()->logo);
    }

    public function test_a_user_cannot_remove_the_logo_of_a_competition_they_do_not_own(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $logo = UploadedFile::fake()->image('logo.png')->store('competitions', 'public');
        $competition = Competition::factory()->for($otherUser)->create(['logo' => $logo]);

        $response = $this->actingAs($user)->deleteJson("/api/competitions/{$competition->id}/logo");

        $response->assertForbidden();

        $this->assertSame($logo, $competition->refresh()->logo);
        Storage::disk('public')->assertExists($logo);
    }
}
