<?php

namespace Tests\Feature\NationalityController;

use App\Enums\Country;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_list_the_nationalities(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->getJson('/api/nationalities');

        $response
            ->assertOk()
            ->assertJsonCount(count(Country::cases()))
            ->assertJsonStructure(['*' => ['code', 'name']])
            ->assertJsonFragment(['code' => 'IT', 'name' => 'Italy'])
            ->assertJsonFragment(['code' => 'CZ', 'name' => 'Czech Republic'])
            ->assertJsonFragment(['code' => 'GB_ENG', 'name' => 'England']);
    }

    public function test_a_guest_cannot_list_the_nationalities(): void
    {
        $response = $this->getJson('/api/nationalities');

        $response->assertUnauthorized();
    }
}
