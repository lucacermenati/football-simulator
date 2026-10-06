<?php

namespace Tests\Feature\CompetitionMatchController;

use App\Models\Competition;
use App\Models\FootballMatch;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_view_a_match_of_their_competition(): void
    {
        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();
        $home = Team::factory()->for($user)->create();
        $away = Team::factory()->for($user)->create();
        $match = FootballMatch::factory()->create([
            'competition_id' => $competition->id,
            'home_team_id' => $home->id,
            'away_team_id' => $away->id,
            'day' => 1,
            'goal_home' => 2,
            'goal_away' => 0,
            'played' => true,
        ]);
        $scorer = Player::factory()->for($user)->for($home)->create();
        $match->scorers()->attach($scorer->id, ['minute' => 30]);
        $match->scorers()->attach($scorer->id, ['minute' => 75]);

        $response = $this->actingAs($user)->getJson("/api/competitions/{$competition->id}/matches/{$match->id}");

        $response
            ->assertOk()
            ->assertJsonPath('id', $match->id)
            ->assertJsonPath('goal_home', 2)
            ->assertJsonPath('goal_away', 0)
            ->assertJsonPath('played', true)
            ->assertJsonPath('competition.id', $competition->id)
            ->assertJsonPath('home_team.id', $home->id)
            ->assertJsonPath('away_team.id', $away->id)
            ->assertJsonCount(2, 'scorers')
            ->assertJsonPath('scorers.0.player.id', $scorer->id)
            ->assertJsonPath('scorers.0.minute', 30)
            ->assertJsonPath('scorers.1.minute', 75);
    }

    public function test_a_match_cannot_be_viewed_through_a_competition_it_does_not_belong_to(): void
    {
        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();
        $otherCompetition = Competition::factory()->for($user)->create();
        $teams = Team::factory()->for($user)->count(2)->create();
        $match = FootballMatch::factory()->create([
            'competition_id' => $otherCompetition->id,
            'home_team_id' => $teams[0]->id,
            'away_team_id' => $teams[1]->id,
            'day' => 1,
        ]);

        $response = $this->actingAs($user)->getJson("/api/competitions/{$competition->id}/matches/{$match->id}");

        $response->assertNotFound();
    }

    public function test_a_user_cannot_view_a_match_of_a_competition_they_do_not_own(): void
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

        $response = $this->actingAs($user)->getJson("/api/competitions/{$competition->id}/matches/{$match->id}");

        $response->assertForbidden();
    }
}
