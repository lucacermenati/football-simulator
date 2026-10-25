<?php

namespace Tests\Feature\TokenController;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_obtain_a_token_with_valid_credentials(): void
    {
        $user = User::factory()->create(['email' => 'ronaldo@example.com']);

        $response = $this->postJson(route('api.token.store'), [
            'email' => 'ronaldo@example.com',
            'password' => 'test1234',
        ]);

        $response
            ->assertOk()
            ->assertJsonPath('token_type', 'Bearer');

        $this->assertNotEmpty($response->json('access_token'));

        $this->assertDatabaseHas('personal_access_tokens', [
            'tokenable_id' => $user->id,
            'name' => 'auth-token',
        ]);
    }

    public function test_a_user_cannot_obtain_a_token_with_a_wrong_password(): void
    {
        $user = User::factory()->create(['email' => 'ronaldo@example.com']);

        $response = $this->postJson(route('api.token.store'), [
            'email' => 'ronaldo@example.com',
            'password' => 'wrong-password',
        ]);

        $response->assertUnauthorized();

        $this->assertDatabaseMissing('personal_access_tokens', ['tokenable_id' => $user->id]);
    }

    public function test_an_unknown_email_cannot_obtain_a_token(): void
    {
        $response = $this->postJson(route('api.token.store'), [
            'email' => 'nobody@example.com',
            'password' => 'test1234',
        ]);

        $response->assertUnauthorized();

        $this->assertDatabaseCount('personal_access_tokens', 0);
    }
}
