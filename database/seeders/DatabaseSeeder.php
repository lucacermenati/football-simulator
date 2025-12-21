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
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
        // Run our custom seeders in the correct order
        $this->call([
            TeamSeeder::class,
            CompetitionSeeder::class,
            PlayerSeeder::class,
            FootballMatchSeeder::class,
        ]);
    }
}
