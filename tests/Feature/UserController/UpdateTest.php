<?php

namespace Tests\Feature\UserController;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_update_their_own_profile(): void
    {
        $user = User::factory()->create([
            'name' => 'Old name',
            'email' => 'old@example.com',
        ]);

        $response = $this->actingAs($user)->putJson(route('api.user.update'), [
            'name' => 'Ronaldo Luis Nazario da Lima',
            'email' => 'ronaldo@example.com',
        ]);

        $response
            ->assertOk()
            ->assertJsonPath('id', $user->id)
            ->assertJsonPath('name', 'Ronaldo Luis Nazario da Lima')
            ->assertJsonPath('email', 'ronaldo@example.com');

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Ronaldo Luis Nazario da Lima',
            'email' => 'ronaldo@example.com',
        ]);
    }
}
