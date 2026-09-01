<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class registerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'name' => 'required|string|min:3',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Le nom est requis',
            'email.required' => 'L\'email est requis',
            'password.required' => 'Le mot de passe est requis',
            'password_confirmation.required' => 'La confirmation du mot de passe est requise',
            'name.min' => 'Le nom doit contenir au moins 3 caracteres',
            'password.min' => 'Le mot de passe doit contenir au moins 6 caracteres',
            'password_confirmation.min' => 'La confirmation du mot de passe doit contenir au moins 6 caracteres',
            'email.max' => 'L\'email ne doit pas dépasser 255 caracteres',
        ];
    }
}
