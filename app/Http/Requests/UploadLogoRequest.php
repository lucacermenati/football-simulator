<?php

namespace App\Http\Requests;

use App\Rules\UploadLogoRuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class UploadLogoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'logo' => UploadLogoRuleFactory::required(),
        ];
    }
}
