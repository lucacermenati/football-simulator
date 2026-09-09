<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CompetitionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,

            'logo' => Str::contains($request->getUri(), 'api')
                ? ($this->logo && Storage::disk('public')->exists($this->logo) ? Storage::disk('public')->url($this->logo) : null)
                : $this->logo,

            'teams' => TeamResource::collection($this->whenLoaded('teams')),
            'matches' => FootballMatchResource::collection($this->whenLoaded('matches')),
        ];
    }
}