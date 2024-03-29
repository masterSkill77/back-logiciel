<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ValidationErrors;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            "name" => 'string:255',
            "email" => 'email|string',
            "password" => 'string|min:8',
            'image',
            'code_postal',
            'user_id'
        ];
    }
}
