<?php

namespace Tests\Feature\PlayerController;

use App\Enums\Country;
use App\Enums\Position;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GenerateTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_generates_a_single_player_by_default(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson('/api/players/generate');

        $response
            ->assertCreated()
            ->assertJsonCount(1)
            ->assertJsonPath('0.team_id', null);

        $this->assertNotEmpty($response->json('0.first_name'));
        $this->assertNotEmpty($response->json('0.last_name'));
        $this->assertNotNull(Country::tryFrom($response->json('0.nationality')));
        $this->assertNotNull(Position::tryFrom($response->json('0.position')));

        $this->assertDatabaseCount('players', 1);
        $this->assertDatabaseHas('players', [
            'id' => $response->json('0.id'),
            'user_id' => $user->id,
            'team_id' => null,
        ]);
    }

    public function test_a_user_can_generate_the_requested_number_of_players(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson('/api/players/generate', ['n' => 5]);

        $response
            ->assertCreated()
            ->assertJsonCount(5);

        $this->assertDatabaseCount('players', 5);
        $this->assertSame(5, $user->players()->count());
    }
}
