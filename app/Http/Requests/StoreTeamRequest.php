<?php

namespace App\Http\Requests;

use App\Rules\UploadLogoRuleFactory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTeamRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('teams', 'name')->where('user_id', $this->user()->id),
            ],
            'history' => 'nullable|string',
            'stadium' => 'nullable|string|max:255',
            'year_of_foundation' => 'nullable|integer|min:1800|max:'.date('Y'),
            'rating' => 'sometimes|integer|min:30|max:100',
            'first_color' => 'required|string|max:7',
            'second_color' => 'required|string|max:7',
            'logo' => UploadLogoRuleFactory::optional(),
        ];
    }
}
