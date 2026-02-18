<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'logo' => $this->logo ? asset('storage/' . $this->logo) : null,
            'first_color' => $this->first_color,
            'second_color' => $this->second_color,
            'year_of_foundation' => $this->year_of_foundation,
            'stadium' => $this->stadium,
            'rating' => $this->rating,
            'history' => $this->history,
            'players' => PlayerResource::collection($this->whenLoaded('players')),
            'competitions' => CompetitionResource::collection($this->whenLoaded('competitions')),
        ];
    }
}
