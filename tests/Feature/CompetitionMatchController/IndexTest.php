<?php

namespace Tests\Feature\CompetitionMatchController;

use App\Models\Competition;
use App\Models\FootballMatch;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_list_the_matches_of_a_given_day(): void
    {
        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();
        [$a, $b, $c, $d] = $this->attachTeams($user, $competition, 4);

        $dayOne = [
            $this->match($competition, $a, $b, day: 1, played: true),
            $this->match($competition, $c, $d, day: 1, played: true),
        ];
        $dayTwo = [
            $this->match($competition, $a, $c, day: 2),
            $this->match($competition, $b, $d, day: 2),
        ];

        $scorer = Player::factory()->for($user)->for($a)->create();
        $dayTwo[0]->scorers()->attach($scorer->id, ['minute' => 12]);

        $response = $this->actingAs($user)->getJson("/api/competitions/{$competition->id}/matches?day=2");

        $response
            ->assertOk()
            ->assertJsonCount(2, 'data')
            ->assertJsonPath('meta.current_page', 2)
            ->assertJsonPath('meta.per_page', 2)
            ->assertJsonPath('meta.last_page', 2)
            ->assertJsonPath('data.0.id', $dayTwo[0]->id)
            ->assertJsonPath('data.0.day', 2)
            ->assertJsonPath('data.0.home_team.id', $a->id)
            ->assertJsonPath('data.0.away_team.id', $c->id)
            ->assertJsonPath('data.0.scorers.0.player.id', $scorer->id)
            ->assertJsonPath('data.0.scorers.0.minute', 12)
            ->assertJsonPath('data.1.id', $dayTwo[1]->id)
            ->assertJsonMissing(['id' => $dayOne[0]->id]);
    }

    public function test_the_first_unplayed_day_is_shown_when_no_day_is_given(): void
    {
        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();
        [$a, $b, $c, $d] = $this->attachTeams($user, $competition, 4);

        $this->match($competition, $a, $b, day: 1, played: true);
        $this->match($competition, $c, $d, day: 1, played: true);
        $this->match($competition, $a, $c, day: 2, played: true);
        $this->match($competition, $b, $d, day: 2, played: true);
        $firstUnplayed = $this->match($competition, $a, $d, day: 3);
        $this->match($competition, $b, $c, day: 3);

        $response = $this->actingAs($user)->getJson("/api/competitions/{$competition->id}/matches");

        $response
            ->assertOk()
            ->assertJsonCount(2, 'data')
            ->assertJsonPath('meta.current_page', 3)
            ->assertJsonPath('data.0.id', $firstUnplayed->id);
    }

    public function test_the_first_day_is_shown_when_every_match_has_been_played_and_no_day_is_given(): void
    {
        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();
        [$a, $b, $c, $d] = $this->attachTeams($user, $competition, 4);

        $first = $this->match($competition, $a, $b, day: 1, played: true);
        $this->match($competition, $c, $d, day: 1, played: true);
        $this->match($competition, $a, $c, day: 2, played: true);
        $this->match($competition, $b, $d, day: 2, played: true);

        $response = $this->actingAs($user)->getJson("/api/competitions/{$competition->id}/matches");

        $response
            ->assertOk()
            ->assertJsonCount(2, 'data')
            ->assertJsonPath('meta.current_page', 1)
            ->assertJsonPath('data.0.id', $first->id);
    }

    public function test_the_last_day_is_shown_when_the_requested_day_is_beyond_the_calendar(): void
    {
        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();
        [$a, $b, $c, $d] = $this->attachTeams($user, $competition, 4);

        $this->match($competition, $a, $b, day: 1);
        $this->match($competition, $c, $d, day: 1);
        $last = $this->match($competition, $a, $c, day: 2);
        $this->match($competition, $b, $d, day: 2);

        $response = $this->actingAs($user)->getJson("/api/competitions/{$competition->id}/matches?day=99");

        $response
            ->assertOk()
            ->assertJsonCount(2, 'data')
            ->assertJsonPath('meta.current_page', 2)
            ->assertJsonPath('data.0.id', $last->id);
    }

    /** @return array<int, Team> */
    private function attachTeams(User $user, Competition $competition, int $count): array
    {
        $teams = Team::factory()->for($user)->count($count)->create();
        $competition->teams()->attach($teams->pluck('id'));

        return $teams->all();
    }

    private function match(Competition $competition, Team $home, Team $away, int $day, bool $played = false): FootballMatch
    {
        return FootballMatch::factory()->create([
            'competition_id' => $competition->id,
            'home_team_id' => $home->id,
            'away_team_id' => $away->id,
            'day' => $day,
            'played' => $played,
        ]);
    }
}
