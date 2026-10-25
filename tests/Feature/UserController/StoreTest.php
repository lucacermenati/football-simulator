<?php

namespace Tests\Feature\UserController;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_visitor_can_register_and_receives_a_token(): void
    {
        $response = $this->postJson(route('api.register'), [
            'name' => 'Ronaldo Luis Nazario da Lima',
            'email' => 'ronaldo@example.com',
            'password' => 'secret-password',
            'password_confirmation' => 'secret-password',
        ]);

        $response
            ->assertOk()
            ->assertJsonPath('token_type', 'Bearer');

        $this->assertNotEmpty($response->json('access_token'));

        $user = User::where('email', 'ronaldo@example.com')->firstOrFail();

        $this->assertSame('Ronaldo Luis Nazario da Lima', $user->name);
        $this->assertTrue(Hash::check('secret-password', $user->password));

        $this->assertDatabaseHas('personal_access_tokens', [
            'tokenable_id' => $user->id,
            'name' => 'auth-token',
        ]);
    }
}
