<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class LoginRequest extends FormRequest
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
            'username' => 'required|unique:users,username,'.auth()->user()->id,
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'Supero la máxima cantidad de caracteres.',
            'username.required' => 'El username es obligatorio.',
            'username.unique' => 'El username ya esta en uso.',
        ];
    }
}
