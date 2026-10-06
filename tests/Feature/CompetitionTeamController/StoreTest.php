<?php

namespace Tests\Feature\CompetitionTeamController;

use App\Models\Competition;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_add_their_teams_to_their_competition(): void
    {
        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();
        $alreadyIn = Team::factory()->for($user)->create();
        $new = Team::factory()->for($user)->count(2)->create();
        $competition->teams()->attach($alreadyIn->id);

        $response = $this->actingAs($user)->postJson("/api/competitions/{$competition->id}/teams", [
            'teams' => [$alreadyIn->id, ...$new->pluck('id')->all()],
        ]);

        $response->assertCreated();

        $this->assertEqualsCanonicalizing(
            [$alreadyIn->id, ...$new->pluck('id')->all()],
            $competition->teams()->pluck('teams.id')->all()
        );
    }

    public function test_teams_owned_by_another_user_are_not_added(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();
        $own = Team::factory()->for($user)->create();
        $foreign = Team::factory()->for($otherUser)->create();

        $response = $this->actingAs($user)->postJson("/api/competitions/{$competition->id}/teams", [
            'teams' => [$own->id, $foreign->id],
        ]);

        $response->assertCreated();

        $this->assertSame([$own->id], $competition->teams()->pluck('teams.id')->all());
    }

    public function test_a_user_cannot_add_teams_to_a_competition_they_do_not_own(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $competition = Competition::factory()->for($otherUser)->create();
        $team = Team::factory()->for($user)->create();

        $response = $this->actingAs($user)->postJson("/api/competitions/{$competition->id}/teams", [
            'teams' => [$team->id],
        ]);

        $response->assertForbidden();

        $this->assertSame(0, $competition->teams()->count());
    }
}
