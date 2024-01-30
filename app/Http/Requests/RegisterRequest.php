<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    use ValidationErrors;
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => 'required|string:255',
            "email" => 'required|email|string|unique:users',
            "password" => 'required|string|min:8',

        ];
    }

    /**
     * Return the message error
     */
    public function messages(): array
    {
        return [
            'email.unique' => "L'email n'est plus disponible",
            'email.required' => "L'email est requis",
            'password.required' => "Le mot de passe est requis",
            'name.required' => "Le nom est requis"
        ];
    }
}
