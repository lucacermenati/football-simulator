<?php

namespace Tests\Feature\UserController;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_view_their_own_profile(): void
    {
        $user = User::factory()->create([
            'name' => 'Ronaldo Luis Nazario da Lima',
            'email' => 'ronaldo@example.com',
        ]);
        User::factory()->create();

        $response = $this->actingAs($user)->getJson(route('api.user.show'));

        $response
            ->assertOk()
            ->assertExactJson([
                'id' => $user->id,
                'name' => 'Ronaldo Luis Nazario da Lima',
                'email' => 'ronaldo@example.com',
            ]);
    }
}
