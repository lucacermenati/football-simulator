<?php

namespace App\Http\Requests;

use App\Enums\Country;
use App\Enums\Position;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePlayerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'birth_date' => 'nullable|date',
            'nationality' => ['nullable', Rule::enum(Country::class)],
            'position' => ['sometimes', 'required', Rule::enum(Position::class)],
            'number' => 'sometimes|required|integer|min:1|max:99',
        ];
    }
}
