<?php

namespace App\Http\Requests\Contact;

use App\Http\Requests\ValidationErrors;
use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
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
            "contact_type"=> 'required|string:150',
            "target"=> 'required|string:150',
            "civility"=> 'nullable|string:150',
            "firstname"=> 'nullable|string:255',
            "lastname"=> 'nullable|string:255',
            "legal_form"=> 'nullable|string:255',
            "company_name"=> 'nullable|string:255',
            "siret"=> 'nullable|string:255',
            "phone"=> 'nullable|string:10',
            "home_phone"=> 'nullable|string:15',
            "mail"=> 'nullable|string:150',
            "country"=> 'nullable|string:255',
            "city"=> 'nullable|string:255',
            "zip"=> 'nullable|string:150',
            "adress"=> 'nullable|string:255',
            "negociator"=> 'required|string:255',
            "contact_source"=> 'required|string:255',
            "note"=> 'nullable|string:255',
            "space_perso_activate"=> 'required|boolean',
            "space_proprio_activate"=> 'required|boolean',
            "man_info"=> 'nullable|array',
            "woman_info"=> 'nullable|array',          
            "bien_id"=> 'required|integer',
            "user_id"=> 'required|integer',         
        ];
    }
}
