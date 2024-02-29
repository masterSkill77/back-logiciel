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
            "InfoCopropriete.lot_number"=> 'nullable|string',
            "InfoCopropriete.total_unit"=> 'nullable|integer',
            "InfoCopropriete.annual_charges"=> 'nullable|string',
            "InfoCopropriete.amount_fund"=> 'nullable|integer',
            "InfoCopropriete.thousands_copropriete"=> 'nullable|string',
            "InfoCopropriete.property_copropriete"=> 'nullable|array',
            "InfoCopropriete.backupPlan"=> 'nullable|string',
            "InfoCopropriete.unionStatus"=> 'nullable|string'
        ];
    }
}