<?php

namespace App\Http\Requests;

use App\Rules\UploadLogoRuleFactory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompetitionRequest extends FormRequest
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
                Rule::unique('competitions', 'name')
                    ->where('user_id', $this->user()->id)
                    ->ignore($this->competition),
            ],
            'description' => 'nullable|string',
            // The API has its own logo endpoints, only the web form replaces or removes the logo here.
            'logo' => $isApi ? 'missing' : UploadLogoRuleFactory::optional(),
            'remove_logo' => $isApi ? 'missing' : 'boolean',
        ];
    }
}
