<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TeamStandingsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'first_color' => $this->first_color,
            'second_color' => $this->second_color,
            'points' => $this->points,
            'matches' => $this->matches,
            'goals' => $this->goals,
            'goals_against' => $this->goals_against,
            'goal_difference' => $this->goal_difference,
            'win' => $this->win,
            'loss' => $this->loss,
            'draw' => $this->draw,

            'logo' => Str::contains($request->getUri(), 'api')
                ? Storage::disk('public')->url($this->logo)
                : $this->logo,
        ];
    }
}
