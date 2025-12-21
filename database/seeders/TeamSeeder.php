<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        // Create 10 teams that aren't part of any competition yet
        collect(range(1, 10))->map(function() {
            // Create team
            $team = Team::factory()->create();
            
            // Create 15-25 players for each team
            $playerCount = random_int(15, 25);
            
            // Generate available numbers for players
            $availableNumbers = collect(range(1, 99))
                ->shuffle()
                ->take($playerCount);
                
            // Create players with unique numbers for this team
            $availableNumbers->each(function($number) use ($team) {
                Player::factory()->create([
                    'team_id' => $team->id,
                    'number' => $number
                ]);
            });
            
            return $team;
        });
    }
}
