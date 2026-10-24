<?php

namespace App\Http\Requests;

use App\Enums\Position;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class PlayersFilterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'search' => 'sometimes|string',
            'free' => 'sometimes|integer',
            'position' => ['sometimes', new Enum(Position::class)],
            'nationality' => 'sometimes|string',
            'sort' => 'sometimes|nullable|string',
        ];
    }

    public function filters(): array
    {
        return [
            'search' => $this->input('search'),
            'free' => $this->boolean('free'),
            'position' => $this->input('position'),
            'nationality' => $this->input('nationality'),
            'sort' => $this->input('sort'),
            'page' => $this->input('page'),
        ];
    }
}
