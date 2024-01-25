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
            
            "contact.title"=> 'required|string:150',
            "contact.contact_type"=> 'required|string:150',
            "contact.target"=> 'required|string:150',
            "contact.civility"=> 'nullable|string:150',
            "contact.firstname"=> 'nullable|string:255',
            "contact.lastname"=> 'nullable|string:255',
            "contact.legal_form"=> 'nullable|string:255',
            "contact.company_name"=> 'nullable|string:255',
            "contact.siret"=> 'nullable|string:255',
            "contact.phone"=> 'nullable|string:10',
            "contact.home_phone"=> 'nullable|string:15',
            "contact.mail"=> 'nullable|string:150',
            "contact.country"=> 'nullable|string:255',
            "contact.city"=> 'nullable|string:255',
            "contact.zip"=> 'nullable|string:150',
            "contact.adress"=> 'nullable|string:255',
            "contact.negociator"=> 'required|string:255',
            "contact.contact_source"=> 'required|string:255',
            "contact.note"=> 'nullable|string:255',
            "contact.space_perso_activate"=> 'required|boolean',
            "contact.space_proprio_activate"=> 'required|boolean',
            "contact.man_info"=> 'nullable|array',
            "contact.woman_info"=> 'nullable|array',                  
        ];
    }
}
