<?php

namespace App\Http\Requests;

use App\Enums\Country;
use App\Enums\Position;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePlayerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Every field is optional: the generator fills whatever is left empty.
        return [
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'nationality' => ['nullable', Rule::enum(Country::class)],
            'position' => ['nullable', Rule::enum(Position::class)],
            'number' => 'nullable|integer|min:1|max:99',
        ];
    }
}
