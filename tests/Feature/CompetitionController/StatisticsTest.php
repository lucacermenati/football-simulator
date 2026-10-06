<?php

namespace Tests\Feature\CompetitionController;

use App\Models\Competition;
use App\Models\FootballMatch;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatisticsTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_view_the_top_scorers_of_their_competition(): void
    {
        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();
        $otherCompetition = Competition::factory()->for($user)->create();

        $home = Team::factory()->for($user)->create();
        $away = Team::factory()->for($user)->create();

        $striker = Player::factory()->for($user)->for($home)->create();
        $midfielder = Player::factory()->for($user)->for($away)->create();
        $outsider = Player::factory()->for($user)->for($home)->create();

        $match = FootballMatch::factory()->create([
            'competition_id' => $competition->id,
            'home_team_id' => $home->id,
            'away_team_id' => $away->id,
            'played' => true,
            'day' => 1,
        ]);
        $match->scorers()->attach($striker->id, ['minute' => 10]);
        $match->scorers()->attach($striker->id, ['minute' => 55]);
        $match->scorers()->attach($midfielder->id, ['minute' => 70]);

        // Goals scored in another competition must not be counted.
        $otherMatch = FootballMatch::factory()->create([
            'competition_id' => $otherCompetition->id,
            'home_team_id' => $home->id,
            'away_team_id' => $away->id,
            'played' => true,
            'day' => 1,
        ]);
        $otherMatch->scorers()->attach($outsider->id, ['minute' => 5]);

        $response = $this->actingAs($user)->getJson("/api/competitions/{$competition->id}/statistics");

        $response
            ->assertOk()
            ->assertJsonCount(2)
            ->assertJsonPath('0.id', $striker->id)
            ->assertJsonPath('0.goals', 2)
            ->assertJsonPath('0.team.id', $home->id)
            ->assertJsonPath('1.id', $midfielder->id)
            ->assertJsonPath('1.goals', 1)
            ->assertJsonPath('1.team.id', $away->id);
    }

    public function test_a_user_can_choose_how_many_top_scorers_to_view(): void
    {
        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();
        $this->playedMatchWithScorers($user, $competition, 20);

        $response = $this->actingAs($user)->getJson("/api/competitions/{$competition->id}/statistics?limit=18");

        $response
            ->assertOk()
            ->assertJsonCount(18);
    }

    public function test_a_user_cannot_view_the_statistics_of_a_competition_they_do_not_own(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $competition = Competition::factory()->for($otherUser)->create();

        $response = $this->actingAs($user)->getJson("/api/competitions/{$competition->id}/statistics");

        $response->assertForbidden();
    }

    private function playedMatchWithScorers(User $user, Competition $competition, int $scorers): FootballMatch
    {
        $home = Team::factory()->for($user)->create();
        $away = Team::factory()->for($user)->create();

        $match = FootballMatch::factory()->create([
            'competition_id' => $competition->id,
            'home_team_id' => $home->id,
            'away_team_id' => $away->id,
            'played' => true,
            'day' => 1,
        ]);

        Player::factory()->for($user)->for($home)->count($scorers)->create()
            ->each(fn (Player $player, int $index) => $match->scorers()->attach($player->id, ['minute' => $index + 1]));

        return $match;
    }
}
