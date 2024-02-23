<?php

namespace App\Http\Requests\Agency;

use App\Http\Requests\ValidationErrors;
use Illuminate\Foundation\Http\FormRequest;

class AgencyRequest extends FormRequest
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
            "nameAgency" => 'required|string:255|unique:agencies',
            "nameCompany" => 'required|string:255',
            "addressCompany" => 'required|string:255',
            "phoneAgency" => 'required|string:15',
        ];
    }


    public function messages(): array
    {
        return [
            "nameAgency.required" => 'Le nom de l\'agence est requis',
            "nameCompany" => 'required|string:255',
            "addressCompany" => 'required|string:255',
            "phoneAgency" => 'required|string:15',
        ];
    }
}
