<?php

namespace Tests\Feature\UserController;

use App\Models\Competition;
use App\Models\FootballMatch;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NextToPlayTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_list_their_competitions_with_unplayed_matches_soonest_first(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        [$home, $away] = Team::factory()->for($user)->count(2)->create();

        $later = Competition::factory()->for($user)->create();
        $sooner = Competition::factory()->for($user)->create();
        $finished = Competition::factory()->for($user)->create();
        $empty = Competition::factory()->for($user)->create();
        $foreign = Competition::factory()->for($otherUser)->create();

        // Played matches must not count, even when they are the earliest.
        $this->match($later, $home, $away, date: now()->subWeek(), played: true);
        $laterNext = $this->match($later, $home, $away, date: now()->addDays(5));
        $this->match($later, $home, $away, date: now()->addDays(9));

        $soonerNext = $this->match($sooner, $home, $away, date: now()->addDay());
        $this->match($sooner, $home, $away, date: now()->addDays(3));

        $this->match($finished, $home, $away, date: now()->subDay(), played: true);
        $this->match($foreign, $home, $away, date: now()->addHour());

        $response = $this->actingAs($user)->getJson(route('api.user.nextToPlay'));

        $response
            ->assertOk()
            ->assertJsonCount(2, 'data')
            ->assertJsonPath('data.0.id', $sooner->id)
            ->assertJsonPath('data.0.name', $sooner->name)
            ->assertJsonPath('data.0.next_match_date', $soonerNext->date->format('Y-m-d H:i:s'))
            ->assertJsonPath('data.1.id', $later->id)
            ->assertJsonPath('data.1.next_match_date', $laterNext->date->format('Y-m-d H:i:s'))
            ->assertJsonMissing(['id' => $finished->id])
            ->assertJsonMissing(['id' => $empty->id])
            ->assertJsonMissing(['id' => $foreign->id]);
    }

    public function test_the_competitions_to_play_are_paginated_three_per_page(): void
    {
        $user = User::factory()->create();
        [$home, $away] = Team::factory()->for($user)->count(2)->create();

        Competition::factory()->for($user)->count(4)->create()->each(function (Competition $competition) use ($home, $away) {
            $this->match($competition, $home, $away, date: now()->addDay());
        });

        $firstPage = $this->actingAs($user)->getJson(route('api.user.nextToPlay', ['page' => 1]));
        $secondPage = $this->actingAs($user)->getJson(route('api.user.nextToPlay', ['page' => 2]));

        $firstPage
            ->assertOk()
            ->assertJsonCount(3, 'data')
            ->assertJsonPath('meta.total', 4)
            ->assertJsonPath('meta.per_page', 3)
            ->assertJsonPath('meta.current_page', 1);

        $secondPage
            ->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('meta.current_page', 2);
    }

    private function match(Competition $competition, Team $home, Team $away, $date, bool $played = false): FootballMatch
    {
        return FootballMatch::factory()->create([
            'competition_id' => $competition->id,
            'home_team_id' => $home->id,
            'away_team_id' => $away->id,
            'date' => $date,
            'played' => $played,
            'day' => 1,
        ]);
    }
}
