<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => ['required', 'confirmed', Password::defaults()],
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'Supero la máxima cantidad de caracteres.',
            'username.required' => 'El username es obligatorio.',
            'username.unique' => 'El username ya esta en uso.',
            'email.required' => 'El email es obligatorio.',
            'email.unique' => 'El email ya esta en uso.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.'
        ];
    }
}
