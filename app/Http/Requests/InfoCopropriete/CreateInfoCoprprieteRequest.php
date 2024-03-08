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
            "InfoCopropriete.lot_number"=> 'required|string',
            "InfoCopropriete.total_unit"=> 'required|integer',
            "InfoCopropriete.annual_charges"=> 'required|string',
            "InfoCopropriete.amount_fund"=> 'required|integer',
            "InfoCopropriete.thousands_copropriete"=> 'required|string',
            "InfoCopropriete.property_copropriete"=> 'required|array',
        ];
    }
}