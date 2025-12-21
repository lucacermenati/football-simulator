<?php

namespace Database\Factories;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    protected $model = Player::class;

    public function definition(): array
    {
        $roles = ['Goalkeeper', 'Defender', 'Midfielder', 'Forward'];
        
        return [
            'first_name' => $this->faker->firstName('male'),
            'last_name' => $this->faker->lastName(),
            'birth_date' => $this->faker->dateTimeBetween('-40 years', '-18 years'),
            'role' => $this->faker->randomElement($roles),
            'number' => $this->faker->numberBetween(1, 99), // Removed unique() constraint
            'team_id' => Team::factory(),
        ];
    }
}
