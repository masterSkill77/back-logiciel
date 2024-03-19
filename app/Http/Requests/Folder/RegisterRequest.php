<?php

namespace App\Http\Requests\Folder;

use App\Http\Requests\ValidationErrors;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'folder_type' => 'bail|required',
            'bien_id' => 'exists:biens,id_bien|required |integer|unique:folders',
            'agency_id' => 'exists:agencies,id|required|integer',
            'num_mandat' => 'exists:biens,num_folder|required |integer',
            'date_signature' => 'required |date',
            'debut_bail' => 'date',
            'fin_bail' => 'date',
        ];
    }
}
