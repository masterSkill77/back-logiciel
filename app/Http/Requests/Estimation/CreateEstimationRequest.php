<?php

namespace App\Http\Requests\Estimation;

use App\Http\Requests\ValidationErrors;
use Illuminate\Foundation\Http\FormRequest;

class CreateEstimationRequest extends FormRequest
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
            'bien' => 'required',
            'demandeur_firstname' => 'required|max:70',
            'demandeur_lastname' => 'required|max:70',
            'demandeur_email' => 'required|max:70|email',
            'details_bien' => 'required|json',
            'address_bien' => '',
            'cp_bien' => 'integer',
            'ville_bien' => '',
        ];
    }
}
