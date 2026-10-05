<?php

namespace App\Console\Commands;

use App\Models\Player;
use Illuminate\Console\Command;

class InitialisePlayerRating extends Command
{
    protected $signature = 'app:initialise-player-rating {teamId?}';

    protected $description = 'Initialise the players rating';

    public function handle()
    {
        $teamId = $this->argument('teamId', false);

        Player::with('team')
            ->whereHas('team')
            ->when($teamId, function ($query) use ($teamId) {
                return $query->where('team_id', $teamId);
            })->chunk(100, function ($players) {
                $players->each(function ($player) {
                    $positionOnField = $player->position_on_field;
                    $teamRating = $player->team->rating;

                    if ($positionOnField > 0 && $positionOnField <= 11) {
                        $player->rating = rand($teamRating - 5, $teamRating + 3);
                    } else {
                        $player->rating = rand($teamRating - 10, $teamRating - 3);
                    }

                    $player->save();
                });
            });
    }
}