<?php

namespace App\Http\Requests\Google;

use App\Http\Requests\ValidationErrors;
use Illuminate\Foundation\Http\FormRequest;

class GetAuthRequest extends FormRequest
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
            'agency_id' => 'exists:agencies,id|required|integer'
        ];
    }
}
