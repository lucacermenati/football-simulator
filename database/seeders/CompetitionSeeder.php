<?php

namespace Database\Seeders;

use App\Models\Competition;
use App\Models\Team;
use Illuminate\Database\Seeder;

class CompetitionSeeder extends Seeder
{
    public function run(): void
    {
        // Create 5 competitions with teams
        Competition::factory()
            ->count(5)
            ->create()
            ->each(function ($competition) {
                // Associate 8-20 random teams with each competition
                $teams = Team::factory()->count(random_int(8, 20))->create();
                $competition->teams()->attach($teams->pluck('id')->toArray());
            });
    }
}
