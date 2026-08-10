<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlayerStatisticResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'full_name' => $this->full_name,
            'position' => $this->position,
            'number' => $this->number,
            'goals' => $this->goals,

            'team' => TeamResource::make($this->whenLoaded('team')),
        ];
    }
}