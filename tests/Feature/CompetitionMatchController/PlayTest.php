<?php

namespace Tests\Feature\CompetitionMatchController;

use App\Enums\Position;
use App\Models\Competition;
use App\Models\FootballMatch;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlayTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_play_every_due_match_of_their_competition(): void
    {
        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();
        [$a, $b, $c, $d] = $this->teamsWithSquads($user, 4);

        $due = $this->match($competition, $a, $b, day: 1, date: now()->subDay());
        $dueToday = $this->match($competition, $c, $d, day: 1, date: now()->subMinute());
        $future = $this->match($competition, $a, $c, day: 2, date: now()->addWeek());
        $alreadyPlayed = $this->match($competition, $b, $d, day: 1, date: now()->subDay(), played: true, goalHome: 7, goalAway: 7);

        $response = $this->actingAs($user)->postJson("/api/competitions/{$competition->id}/matches/play");

        $response->assertOk();

        $this->assertTrue($due->refresh()->played);
        $this->assertTrue($dueToday->refresh()->played);
        $this->assertFalse($future->refresh()->played);

        $alreadyPlayed->refresh();
        $this->assertSame(7, $alreadyPlayed->goal_home);
        $this->assertSame(7, $alreadyPlayed->goal_away);
        $this->assertSame(0, $alreadyPlayed->scorers()->count());

        foreach ([$due, $dueToday] as $match) {
            $this->assertSame($match->goal_home + $match->goal_away, $match->scorers()->count());
            $this->assertTrue($match->scorers->every(fn (Player $player) => in_array($player->team_id, [$match->home_team_id, $match->away_team_id], true)));
        }
    }

    public function test_a_user_can_play_a_single_match_of_their_competition(): void
    {
        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();
        [$a, $b, $c, $d] = $this->teamsWithSquads($user, 4);

        $target = $this->match($competition, $a, $b, day: 1, date: now()->subDay());
        $other = $this->match($competition, $c, $d, day: 1, date: now()->subDay());

        $response = $this->actingAs($user)->postJson("/api/competitions/{$competition->id}/matches/play", [
            'match_id' => $target->id,
        ]);

        $response->assertOk();

        $this->assertTrue($target->refresh()->played);
        $this->assertFalse($other->refresh()->played);
    }

    public function test_a_user_can_play_a_whole_day_of_their_competition(): void
    {
        $user = User::factory()->create();
        $competition = Competition::factory()->for($user)->create();
        [$a, $b, $c, $d] = $this->teamsWithSquads($user, 4);

        $dayOneFirst = $this->match($competition, $a, $b, day: 1, date: now()->subDays(2));
        $dayOneSecond = $this->match($competition, $c, $d, day: 1, date: now()->subDays(2));
        $dayTwo = $this->match($competition, $a, $c, day: 2, date: now()->subDay());

        $response = $this->actingAs($user)->postJson("/api/competitions/{$competition->id}/matches/play", [
            'day' => 1,
        ]);

        $response->assertOk();

        $this->assertTrue($dayOneFirst->refresh()->played);
        $this->assertTrue($dayOneSecond->refresh()->played);
        $this->assertFalse($dayTwo->refresh()->played);
    }

    public function test_a_user_cannot_play_the_matches_of_a_competition_they_do_not_own(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $competition = Competition::factory()->for($otherUser)->create();
        [$a, $b] = $this->teamsWithSquads($otherUser, 2);
        $match = $this->match($competition, $a, $b, day: 1, date: now()->subDay());

        $response = $this->actingAs($user)->postJson("/api/competitions/{$competition->id}/matches/play");

        $response->assertForbidden();

        $this->assertFalse($match->refresh()->played);
    }

    /** @return array<int, Team> */
    private function teamsWithSquads(User $user, int $count): array
    {
        return Team::factory()->for($user)->count($count)->create()
            ->each(function (Team $team) use ($user) {
                Player::factory()
                    ->for($user)
                    ->for($team)
                    ->count(11)
                    ->state(new Sequence(fn (Sequence $sequence) => ['position_on_field' => $sequence->index + 1]))
                    ->create([
                        'position' => Position::Forward,
                        'rating' => 80,
                    ]);
            })
            ->all();
    }

    private function match(
        Competition $competition,
        Team $home,
        Team $away,
        int $day,
        $date,
        bool $played = false,
        int $goalHome = 0,
        int $goalAway = 0,
    ): FootballMatch {
        return FootballMatch::factory()->create([
            'competition_id' => $competition->id,
            'home_team_id' => $home->id,
            'away_team_id' => $away->id,
            'day' => $day,
            'date' => $date,
            'played' => $played,
            'goal_home' => $goalHome,
            'goal_away' => $goalAway,
        ]);
    }
}
