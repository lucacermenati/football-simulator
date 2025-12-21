<?php

namespace Database\Factories;

use App\Models\Competition;
use App\Models\FootballMatch;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class FootballMatchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FootballMatch::class;

    public function definition(): array
    {
        return [
            'competition_id' => Competition::factory(),
            'home_team_id' => Team::factory(),
            'away_team_id' => Team::factory(),
            'goal_home' => $this->faker->numberBetween(0, 5),
            'goal_away' => $this->faker->numberBetween(0, 5),
            'date' => $this->faker->dateTimeBetween('-6 months', '+1 month'),
        ];
    }
}
