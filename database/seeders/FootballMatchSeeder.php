<?php

namespace Database\Seeders;

use App\Models\Competition;
use App\Models\FootballMatch;
use App\Models\Player;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class FootballMatchSeeder extends Seeder
{
    public function run(): void
    {
        $competitions = Competition::with('teams')->get();
        
        // Create matches for each competition
        $competitions->each(function($competition) {
            // Get all teams in this competition
            $teams = $competition->teams;
            
            if ($teams->count() < 2) {
                return;
            }
            
            // Create some matches between teams in this competition
            $matchCount = min(20, $teams->count() * ($teams->count() - 1) / 2);
            
            // Use collection methods to generate unique pairs of teams
            collect(range(1, $matchCount))->each(function() use ($competition, $teams) {
                // Pick two different teams
                $teamPair = $teams->random(2);
                $homeTeam = $teamPair[0];
                $awayTeam = $teamPair[1];
                
                $homeGoals = random_int(0, 5);
                $awayGoals = random_int(0, 5);
                
                // Create the match
                $match = FootballMatch::create([
                    'competition_id' => $competition->id,
                    'home_team_id' => $homeTeam->id,
                    'away_team_id' => $awayTeam->id,
                    'goal_home' => $homeGoals,
                    'goal_away' => $awayGoals,
                    'date' => now()->subDays(random_int(1, 60))->addHours(random_int(12, 20)),
                ]);
                
                // Add goal scorers
                $this->assignTeamGoalScorers($match, $homeTeam->id, $homeGoals);
                $this->assignTeamGoalScorers($match, $awayTeam->id, $awayGoals);
            });
        });
    }
    
    private function assignTeamGoalScorers(FootballMatch $match, string $teamId, int $goals): void
    {
        if ($goals <= 0) {
            return;
        }
        
        // Get forwards and midfielders from this team (most likely to score)
        $potentialScorers = Player::where('team_id', $teamId)
            ->whereIn('role', ['Forward', 'Midfielder'])
            ->get();
            
        // Fallback to any player if no forwards/midfielders
        if ($potentialScorers->isEmpty()) {
            $potentialScorers = Player::where('team_id', $teamId)->get();
        }
        
        if ($potentialScorers->isEmpty()) {
            return;
        }
        
        // Create scorer data using collection methods
        collect(range(1, $goals))
            ->map(function () use ($match, $potentialScorers) {
                return [
                    'match_id' => $match->id,
                    'player_id' => $potentialScorers->random()->id,
                    'minute' => random_int(1, 90),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            })
            ->pipe(function ($records) {
                // Insert all records at once for better performance
                DB::table('matches_players')->insert($records->all());
                return $records;
            });
    }
}
