<?php

namespace Tests\Feature\TokenController;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DestroyTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_revoke_the_token_they_are_using(): void
    {
        $user = User::factory()->create();
        $current = $user->createToken('auth-token');
        $other = $user->createToken('auth-token');

        $response = $this->withToken($current->plainTextToken)->deleteJson(route('api.token.destroy'));

        $response->assertNoContent(200);

        $this->assertDatabaseMissing('personal_access_tokens', ['id' => $current->accessToken->id]);
        $this->assertDatabaseHas('personal_access_tokens', ['id' => $other->accessToken->id]);
    }
}
