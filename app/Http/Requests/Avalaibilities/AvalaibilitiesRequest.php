<?php

namespace App\Http\Requests\Avalaibilities;

use App\Http\Requests\ValidationErrors;
use Illuminate\Foundation\Http\FormRequest;

class AvalaibilitiesRequest extends FormRequest
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
            "availabilities.num_folder" => 'integer',
            "availabilities.created_folder" => 'date',
            "availabilities.updated_folder" => 'date',
            "availabilities.immediat" => 'string',
            "availabilities.release_it" => 'string',
            "availabilities.available_on" => 'string',
        ];
    }
}
