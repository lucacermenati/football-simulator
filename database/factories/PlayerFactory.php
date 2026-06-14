<?php

namespace Database\Factories;

use App\Enums\Role;
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
            'role' => $this->randomRole(),
            'number' => $this->faker->numberBetween(1, 99),
            'team_id' => Team::factory(),
        ];
    }

    public function fromRandomLocale(?string $locale = null): static
    {
        return $this->state(function () use ($locale) {
            $locales = config('locales.player_locales');
            $fakerLocale = $locale ?? $locales[array_rand($locales)];
            $faker = fake($fakerLocale);

            $nationality = match ($fakerLocale) {
                'en_GB' => collect(['EN', 'SC', 'WA'])->random(),
                default => strtoupper(substr($fakerLocale, -2)),
            };

            return [
                'first_name' => Str::ascii($faker->firstName('male')),
                'last_name' => Str::ascii($faker->lastName()),
                'birth_date' => $faker->dateTimeBetween('-40 years', '-18 years'),
                'nationality' => $nationality,
                'role' => $this->randomRole(),
                'number' => $faker->numberBetween(1, 99),
            ];
        });
    }

    private function randomRole(): Role
    {
        return fake()->randomElement([
            Role::Goalkeeper,
            ...array_fill(0, 4, Role::Defender),
            ...array_fill(0, 4, Role::Midfielder),
            ...array_fill(0, 3, Role::Forward),
        ]);
    }
}
