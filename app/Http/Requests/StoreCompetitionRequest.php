<?php

namespace App\Http\Requests;

use App\Rules\UploadLogoRuleFactory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCompetitionRequest extends FormRequest
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
                Rule::unique('competitions', 'name')->where('user_id', $this->user()->id),
            ],
            'description' => 'nullable|string',
            'logo' => UploadLogoRuleFactory::optional(),
        ];
    }
}
