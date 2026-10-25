<?php

namespace App\Http\Requests;

use App\Rules\UploadLogoRuleFactory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTeamRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isApi = $this->routeIs('api.*');

        return [
            'name' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('teams', 'name')
                    ->where('user_id', $this->user()->id)
                    ->ignore($this->team),
            ],
            'history' => 'nullable|string',
            'stadium' => 'nullable|string|max:255',
            'year_of_foundation' => 'nullable|integer|min:1800|max:'.date('Y'),
            'rating' => 'sometimes|required|integer|min:30|max:100',
            'first_color' => 'sometimes|required|string|max:7',
            'second_color' => 'sometimes|required|string|max:7',
            // The API has its own logo endpoints, only the web form replaces or removes the logo here.
            'logo' => $isApi ? 'missing' : UploadLogoRuleFactory::optional(),
            'remove_logo' => $isApi ? 'missing' : 'boolean',
        ];
    }
}
