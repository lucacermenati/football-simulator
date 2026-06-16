<?php

namespace App\Http\Requests;

use App\Enums\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'role' => ['sometimes', Rule::enum(Role::class)],
            'nationality' => 'sometimes|string',
        ];
    }

    public function filters(): array
    {
        return [
            'search' => $this->input('search'),
            'free' => $this->boolean('free'),
            'role' => $this->input('role'),
            'nationality' => $this->input('nationality'),
            'page' => $this->input('page')
        ];
    }
}