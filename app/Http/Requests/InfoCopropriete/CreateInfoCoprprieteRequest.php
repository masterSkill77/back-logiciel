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
            "lot_number"=> 'required|string',
            "total_unit"=> 'required|integer',
            "annual_charges"=> 'required|string',
            "amount_fund"=> 'required|bigInteger',
            "thousands_copropriete"=> 'required|string',
            "property_copropriete"=> 'required|json',
        ];
    }
}