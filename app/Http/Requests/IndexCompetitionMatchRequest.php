<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexCompetitionMatchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'day' => 'nullable|integer|min:1',
        ];
    }
}
