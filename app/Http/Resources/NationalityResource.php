<?php

namespace App\Http\Resources;

use App\Enums\Country;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Country */
class NationalityResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'code' => $this->value,
            'name' => $this->name(),
        ];
    }
}
