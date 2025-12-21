<?php

namespace Database\Factories;

use App\Models\Competition;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompetitionFactory extends Factory
{
    protected $model = Competition::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->words(3, true),
            'description' => $this->faker->paragraph(),
        ];
    }
}
