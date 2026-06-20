<?php

namespace Database\Factories;

use App\Enums\Country;
use App\Enums\Position;
use App\Faker\FakerFactory;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PlayerFactory extends Factory
{
    protected $model = Player::class;

    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName('male'),
            'last_name' => $this->faker->lastName(),
            'birth_date' => $this->faker->dateTimeBetween('-40 years', '-18 years'),
            'position' => $this->randomPosition(),
            'number' => $this->faker->numberBetween(1, 99),
            'team_id' => Team::factory(),
        ];
    }

    public function country(string|Country|null $country = null): static
    {
        return $this->state(function () use ($country) {
            $country = match (true) {
                $country instanceof Country => $country,
                is_string($country) => Country::from($country),
                default => Country::random(),
            };

            $fakerLocales = $country->locales();
            $locale = $fakerLocales[array_rand($fakerLocales)];

            $faker = FakerFactory::create($locale);

            return [
                // TODO: figure out which locale does not like conversion to ascii
                'first_name' => Str::ucfirst(Str::ascii($faker->firstName('male'))),
                'last_name' => Str::ucfirst(Str::ascii($faker->lastName())),
                'birth_date' => $faker->dateTimeBetween('-40 years', '-18 years'),
                'nationality' => $country->value,
                'position' => $this->randomPosition(),
                'number' => $faker->numberBetween(1, 99),
            ];
        });
    }

    private function randomPosition(): Position
    {
        return fake()->randomElement([
            Position::Goalkeeper,
            ...array_fill(0, 4, Position::Defender),
            ...array_fill(0, 4, Position::Midfielder),
            ...array_fill(0, 3, Position::Forward),
        ]);
    }
}
