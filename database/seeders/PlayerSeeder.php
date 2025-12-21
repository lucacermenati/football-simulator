<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    public function run(): void
    {
        // We don't need to create players directly here
        // as they're already created in TeamSeeder
        // This is just in case we want to create additional players
        
        // Get all teams
        $teams = Team::all();
        
        // Create 30 additional players distributed among teams
        collect(range(1, 30))->each(function () use ($teams) {
            $team = $teams->random();
            
            // Find a number that doesn't exist for this team
            $existingNumbers = $team->players->pluck('number')->toArray();
            $number = collect(range(1, 99))
                ->filter(fn ($num) => !in_array($num, $existingNumbers))
                ->random();
                
            Player::factory()->create([
                'team_id' => $team->id,
                'number' => $number
            ]);
        });
    }
}
