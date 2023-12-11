<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ValidationErrors;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            "role" => 'required|string',
            "agency_id" => 'exists:App\Models\Agency,id',
        ];
    }
}
