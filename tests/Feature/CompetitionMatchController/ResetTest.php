<?php

namespace Tests\Feature\CompetitionMatchController;

use App\Models\Competition;
use App\Models\FootballMatch;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_reset_the_calendar_of_their_competition(): void
    {
        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();
        $otherCompetition = Competition::factory()->for($user)->create();
        $teams = Team::factory()->for($user)->count(2)->create();

        $match = FootballMatch::factory()->create([
            'competition_id' => $competition->id,
            'home_team_id' => $teams[0]->id,
            'away_team_id' => $teams[1]->id,
            'day' => 1,
            'played' => true,
        ]);
        $scorer = Player::factory()->for($user)->for($teams[0])->create();
        $match->scorers()->attach($scorer->id, ['minute' => 20]);

        $untouched = FootballMatch::factory()->create([
            'competition_id' => $otherCompetition->id,
            'home_team_id' => $teams[0]->id,
            'away_team_id' => $teams[1]->id,
            'day' => 1,
        ]);

        $response = $this->actingAs($user)->deleteJson("/api/competitions/{$competition->id}/matches/reset");

        $response->assertNoContent();

        $this->assertDatabaseMissing('matches', ['id' => $match->id]);
        $this->assertDatabaseMissing('matches_players', ['match_id' => $match->id]);
        $this->assertDatabaseHas('matches', ['id' => $untouched->id]);
    }

    public function test_a_user_cannot_reset_the_calendar_of_a_competition_they_do_not_own(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $competition = Competition::factory()->for($otherUser)->create();
        $teams = Team::factory()->for($otherUser)->count(2)->create();
        $match = FootballMatch::factory()->create([
            'competition_id' => $competition->id,
            'home_team_id' => $teams[0]->id,
            'away_team_id' => $teams[1]->id,
            'day' => 1,
        ]);

        $response = $this->actingAs($user)->deleteJson("/api/competitions/{$competition->id}/matches/reset");

        $response->assertForbidden();

        $this->assertDatabaseHas('matches', ['id' => $match->id]);
    }
}
