<?php

namespace App\Http\Requests\InfoCopropriete;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\ValidationErrors;

class CreateInfoCoprprieteRequest extends FormRequest
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
            "InfoCopropriete.lot_number" => '',
            "InfoCopropriete.total_unit" => '',
            "InfoCopropriete.annual_charges" => '',
            "InfoCopropriete.amount_fund" => '',
            "InfoCopropriete.thousands_copropriete" => '',
            "InfoCopropriete.property_copropriete" => 'array',
        ];
    }
}
