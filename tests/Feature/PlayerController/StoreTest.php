<?php

namespace Tests\Feature\PlayerController;

use App\Enums\Country;
use App\Enums\Position;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_create_a_fully_generated_player(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson(route('api.players.store'));

        $response
            ->assertCreated()
            ->assertJsonPath('team_id', null);

        $this->assertNotEmpty($response->json('first_name'));
        $this->assertNotEmpty($response->json('last_name'));
        $this->assertNotNull(Country::tryFrom($response->json('nationality')));
        $this->assertNotNull(Position::tryFrom($response->json('position')));
        $this->assertGreaterThanOrEqual(1, $response->json('number'));
        $this->assertLessThanOrEqual(99, $response->json('number'));

        $this->assertDatabaseHas('players', [
            'id' => $response->json('id'),
            'user_id' => $user->id,
            'team_id' => null,
        ]);
    }

    public function test_a_user_can_create_a_player_with_a_given_nationality(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson(route('api.players.store'), [
            'nationality' => 'GB_ENG',
        ]);

        $response
            ->assertCreated()
            ->assertJsonPath('nationality', 'GB_ENG');

        $this->assertNotEmpty($response->json('first_name'));
        $this->assertNotEmpty($response->json('last_name'));

        $this->assertDatabaseHas('players', [
            'id' => $response->json('id'),
            'user_id' => $user->id,
            'nationality' => 'GB_ENG',
        ]);
    }

    public function test_provided_fields_override_generated_ones(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson(route('api.players.store'), [
            'first_name' => 'Zlatan',
            'last_name' => 'Ibrahimovic',
            'birth_date' => '1981-10-03',
            'nationality' => 'SE',
            'position' => Position::Forward->value,
            'number' => 10,
        ]);

        $response
            ->assertCreated()
            ->assertJsonPath('first_name', 'Zlatan')
            ->assertJsonPath('last_name', 'Ibrahimovic')
            ->assertJsonPath('nationality', 'SE')
            ->assertJsonPath('position', Position::Forward->value)
            ->assertJsonPath('number', 10);

        $this->assertDatabaseHas('players', [
            'id' => $response->json('id'),
            'user_id' => $user->id,
            'first_name' => 'Zlatan',
            'last_name' => 'Ibrahimovic',
            'birth_date' => '1981-10-03 00:00:00',
            'nationality' => 'SE',
            'position' => Position::Forward->value,
            'number' => 10,
            'team_id' => null,
        ]);
    }
}
