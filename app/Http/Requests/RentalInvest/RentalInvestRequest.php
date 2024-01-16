<?php

namespace App\Http\Requests\RentalInvest;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\ValidationErrors;

class RentalInvestRequest extends FormRequest
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
            "estimated_rent"=> 'required|string',
            "monthly_rent"=> 'required|string',
            "yeld"=> 'required|string',
            "occupancy"=> 'required|integer'
        ];
    }
}