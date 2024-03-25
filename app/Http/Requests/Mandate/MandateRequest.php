<?php

namespace App\Http\Requests\Mandate;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\ValidationErrors;

class MandateRequest extends FormRequest
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
            "Mandate.num_mandat" => 'nullable',
            "Mandate.person" => 'nullable|string',
            "Mandate.bien_id_bien" => 'nullable',
            "Mandate.contact_id_contact" => 'nullable',
        ];
    }
}
