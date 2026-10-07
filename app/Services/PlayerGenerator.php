<?php

namespace App\Services;

use App\Enums\Country;
use App\Enums\Position;
use App\Faker\FakerFactory;
use Faker\Generator;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class PlayerGenerator
{
    /**
     * Generate a realistic, nationality-aware player attribute set.
     *
     * Non-empty overrides win over generated values. The `nationality`
     * override (string code or Country) also selects the faker locale.
     *
     * @param  array<string, mixed>  $overrides
     * @return array<string, mixed>
     */
    public function attributes(array $overrides = []): array
    {
        $overrides = array_filter($overrides, fn ($value) => $value !== null && $value !== '');

        $country = $this->resolveCountry($overrides['nationality'] ?? null);
        $faker = FakerFactory::forCountry($country);
        [$firstName, $lastName] = $this->latinNames($faker);

        return [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'birth_date' => $faker->dateTimeBetween('-40 years', '-18 years'),
            'position' => $this->weightedPosition(),
            'number' => $faker->numberBetween(1, 99),
            ...$overrides,
            'nationality' => $country->value,
        ];
    }

    /**
     * Generate several players; each one gets its own random country unless overridden.
     *
     * @param  array<string, mixed>  $overrides
     * @return array<int, array<string, mixed>>
     */
    public function many(int $count, array $overrides = []): array
    {
        return array_map(fn () => $this->attributes($overrides), range(1, $count));
    }

    private function resolveCountry(Country|string|null $country): Country
    {
        return match (true) {
            $country instanceof Country => $country,
            is_string($country) => Country::from($country),
            default => Country::random(),
        };
    }

    private function weightedPosition(): Position
    {
        return Arr::random([
            Position::Goalkeeper,
            ...array_fill(0, 4, Position::Defender),
            ...array_fill(0, 4, Position::Midfielder),
            ...array_fill(0, 3, Position::Forward),
        ]);
    }

    /**
     * Names transliterated to ASCII. Non-Latin scripts (he, ja, ko, zh, th) have no
     * transliteration and come back empty, so those fall back to the default locale.
     *
     * @return array{string, string}
     */
    private function latinNames(Generator $faker): array
    {
        $names = [
            Str::ucfirst(Str::ascii($faker->firstName('male'))),
            Str::ucfirst(Str::ascii($faker->lastName())),
        ];

        return $names;
    }
}
