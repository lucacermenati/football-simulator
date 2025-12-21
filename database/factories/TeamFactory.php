<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    protected $model = Team::class;

    protected $locale;

    public function __construct()
    {
        parent::__construct();
        $this->locale = config('app.faker_locale', 'en_US');
    }

    public function setLocale(string $locale): static
    {
        $clone = clone $this;
        $clone->locale = $locale;

        return $clone;
    }

    public function definition(): array
    {
        $faker = fake($this->locale);

        $city = $faker->city();

        return [
            'name' => $city,
            'logo' => $faker->imageUrl(200, 200, 'sports'),
            'first_color' => $faker->hexColor(),
            'second_color' => $faker->hexColor(),
            'year_of_foundation' => $faker->numberBetween(1900, 2023),
            'stadium' => $city . ' Stadium',
        ];
    }
}
