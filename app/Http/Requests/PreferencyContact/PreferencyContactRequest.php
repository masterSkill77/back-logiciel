<?php

namespace App\Http\Requests\PreferencyContact;

use App\Http\Requests\ValidationErrors;
use Illuminate\Foundation\Http\FormRequest;

class PreferencyContactRequest extends FormRequest
{
    use ValidationErrors;

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
            "preferencyContact.criteria" => 'required|string',
            "preferencyContact.min_budgets" => 'nullable',
            "preferencyContact.max_budgets" => 'nullable',
            "preferencyContact.min_surface" => 'nullable',
            "preferencyContact.max_surface" => 'nullable',
            "preferencyContact.min_room" => 'nullable|integer',
            "preferencyContact.max_room" => 'nullable|integer',
            "preferencyContact.min_bedroom" => 'nullable|integer',
            "preferencyContact.max_bedroom" => 'nullable|integer',
            "preferencyContact.localities" => 'nullable|string',
            "preferencyContact.commune" => 'nullable|string',
            "preferencyContact.zip" => 'nullable|string',
            "preferencyContact.start_date" => 'nullable|date',
            "preferencyContact.end_date" => 'nullable|date',
            "preferencyContact.night_number" => 'nullable|integer',
            "preferencyContact.type_offert_id" => 'nullable|integer',
            "preferencyContact.type_estate_id" => 'nullable|integer',
        ];
    }
}