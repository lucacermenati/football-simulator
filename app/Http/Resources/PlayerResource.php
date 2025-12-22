<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'full_name' => $this->full_name,
            'birth_date' => $this->birth_date,
            'role' => $this->role,
            'number' => $this->number,
            'team_id' => $this->team_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'team' => new TeamResource($this->whenLoaded('team')),
            'scored_matches' => FootballMatchResource::collection($this->whenLoaded('scoredMatches')),
        ];
    }
}