<?php

namespace App\Http\Requests\Folder;

use App\Http\Requests\ValidationErrors;
use Illuminate\Foundation\Http\FormRequest;

class RegisterStepRequest extends FormRequest
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
            'active',
            'step_duration' => 'integer',
            'folder_id' => 'exists:folders,id|required',
            'step_date' => 'date',
            'step_name' => 'required|string|min:4'
        ];
    }
}
