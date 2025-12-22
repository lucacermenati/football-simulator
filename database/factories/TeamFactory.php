<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    protected $model = Team::class;

    public function definition(): array
    {
        $city = $this->faker->city();

        return [
            'name' => $city,
            'logo' => $this->faker->imageUrl(200, 200, 'sports'),
            'first_color' => $this->faker->hexColor(),
            'second_color' => $this->faker->hexColor(),
            'year_of_foundation' => $this->faker->numberBetween(1900, 2023),
            'stadium' => $city . ' Stadium',
            'rating' => $this->faker->numberBetween(30, 100),
        ];
    }

    public function fromLocale(string $locale): static
    {
        return $this->state(function () use ($locale) {
            $faker = fake($locale);
            $city = $faker->city();

            return [
                'name' => $city,
                'logo' => $faker->imageUrl(200, 200, 'sports'),
                'first_color' => $faker->hexColor(),
                'second_color' => $faker->hexColor(),
                'year_of_foundation' => $faker->numberBetween(1900, 2023),
                'stadium' => $city . ' Stadium',
                'rating' => $faker->numberBetween(30, 100),
            ];
        });
    }
}
