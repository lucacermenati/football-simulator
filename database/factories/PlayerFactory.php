<?php

namespace Database\Factories;

use App\Enums\Position;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    protected $model = Player::class;

    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName('male'),
            'last_name' => $this->faker->lastName(),
            'birth_date' => $this->faker->dateTimeBetween('-40 years', '-18 years'),
            'position' => $this->faker->randomElement(Position::cases()),
            'number' => $this->faker->numberBetween(1, 99),
            'team_id' => Team::factory(),
        ];
    }
}
