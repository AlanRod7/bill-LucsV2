<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'names' => ['required', 'string', 'max:25'],
            'second_name' => ['required', 'string', 'max:25'],
            'nacimiento' => ['required', 'date'],
            'rfc' => ['required', 'string', 'max:255'],
            'curp' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:25'],
            'calle' => ['required', 'string', 'max:255'],
            'colonia' => ['required', 'string', 'max:255'],
            'cp' => ['required', 'integer', 'min:1'],
            'ciudad' => ['required', 'string', 'max:255'],
            'estado' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}
