<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title"=> 'required|string',
            "sort"=> 'required|json',
            "main_info"=> 'required|json',
            "space_perso_activate"=> 'required|boolean',
            "space_proprio_activate"=> 'required|boolean',
            "bien_id"=> 'required|integer',
            "user_id"=> 'required|integer',
            
        ];
    }
}
