<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Luca',
            'email' => 'luca@igne.nl',
        ]);

        // Run our custom seeders in the correct order
        $this->call([
            CompetitionSeeder::class,
            // TeamSeeder::class,
            // PlayerSeeder::class,
            // FootballMatchSeeder::class,
        ]);
    }
}
