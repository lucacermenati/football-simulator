<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NextCompetitionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'logo' => Str::contains($request->getUri(), 'api')
                ? ($this->logo && Storage::disk('public')->exists($this->logo) ? Storage::disk('public')->url($this->logo) : null)
                : $this->logo,

            'next_match_date' => $this->next_match_date,
        ];
    }
}
