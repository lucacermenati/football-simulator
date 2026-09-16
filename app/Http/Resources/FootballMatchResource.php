<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FootballMatchResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'goal_home' => $this->goal_home,
            'goal_away' => $this->goal_away,
            'played' => $this->played,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'competition' => new CompetitionResource($this->whenLoaded('competition')),
            'home_team' => new TeamResource($this->whenLoaded('homeTeam')),
            'away_team' => new TeamResource($this->whenLoaded('awayTeam')),
            'scorers' => $this->when($this->relationLoaded('scorers'), function() {
                return $this->scorers->map(function($player) {
                    return [
                        'player' => new PlayerResource($player),
                        'minute' => $player->pivot->minute
                    ];
                });
            }),
        ];
    }
}