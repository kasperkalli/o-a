<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userstoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Un nombre es requerido',
            'name.unique' => 'Este nombre ya existe',
            'name.max' => 'El nombre no puede tener más de 255 caracteres',
            'email.required' => 'Un email es requerido',
            'email.email' => 'El email no tiene el formato correcto',
            'email.max' => 'El email no puede tener más de 255 caracteres',
            'email.unique' => 'Este email ya existe',
            'password.required' => 'Una contraseña es requerida',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden',
        ];
    }
}
