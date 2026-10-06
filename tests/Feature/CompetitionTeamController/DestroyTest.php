<?php

namespace Tests\Feature\CompetitionTeamController;

use App\Models\Competition;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DestroyTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_remove_teams_from_their_competition(): void
    {
        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();
        [$removed, $kept] = Team::factory()->for($user)->count(2)->create();
        $competition->teams()->attach([$removed->id, $kept->id]);

        $response = $this->actingAs($user)->deleteJson("/api/competitions/{$competition->id}/teams", [
            'teams' => [$removed->id],
        ]);

        $response->assertNoContent();

        $this->assertSame([$kept->id], $competition->teams()->pluck('teams.id')->all());
        $this->assertDatabaseHas('teams', ['id' => $removed->id]);
    }

    public function test_teams_owned_by_another_user_are_not_removed(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();
        $foreign = Team::factory()->for($otherUser)->create();
        $competition->teams()->attach($foreign->id);

        $response = $this->actingAs($user)->deleteJson("/api/competitions/{$competition->id}/teams", [
            'teams' => [$foreign->id],
        ]);

        $response->assertNoContent();

        $this->assertSame([$foreign->id], $competition->teams()->pluck('teams.id')->all());
    }

    public function test_a_user_cannot_remove_teams_from_a_competition_they_do_not_own(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $competition = Competition::factory()->for($otherUser)->create();
        $team = Team::factory()->for($otherUser)->create();
        $competition->teams()->attach($team->id);

        $response = $this->actingAs($user)->deleteJson("/api/competitions/{$competition->id}/teams", [
            'teams' => [$team->id],
        ]);

        $response->assertForbidden();

        $this->assertSame([$team->id], $competition->teams()->pluck('teams.id')->all());
    }
}
