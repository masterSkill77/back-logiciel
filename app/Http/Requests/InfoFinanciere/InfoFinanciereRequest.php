<?php

namespace App\Http\Requests\InfoFinanciere;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\ValidationErrors;

class InfoFinanciereRequest extends FormRequest
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
            "info_price"=> 'required|integer',
            "info_rent"=> 'required|integer',
            "info_rent_encadrement"=> 'required|boolean',
            "info_rent_default"=> 'required|integer',
            "info_rent_majored"=> 'required|integer',
            "info_rent_complement"=> 'required|integer',
            "info_locative_charge_total"=> 'required|integer',
            "info_locative_charge_format"=> 'required|string',
            "info_honoraire_charge"=> 'required|array',
            "info_estimation_value"=> 'required|integer',
            "info_estimation_date"=> 'required|date',
            "info_honoraire_locataire_part"=> 'required|array',
            "info_honoraire_proprio_part"=> 'required|array',
            "info_predicted_work"=> 'required|string',
            "info_monthly_charge"=> 'required|integer',
            "info_garantied_deposit"=> 'required|string',
            "info_fonciere_taxe"=> 'required|integer',
            "info_habitation_taxe"=> 'required|integer',
            "info_ordure_menagere_taxe"=> 'required|integer'
        ];
    }
}