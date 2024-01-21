<?php

namespace App\Http\Requests\Advertissement;

use App\Http\Requests\ValidationErrors;
use Illuminate\Foundation\Http\FormRequest;

class AdvertissementRequest extends FormRequest
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
            "advertissement.title" => 'required|string:25',
            "advertissement.description" => 'required|string:255'
        ];
    }
}
