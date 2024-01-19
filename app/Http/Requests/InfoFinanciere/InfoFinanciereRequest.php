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
            "InfoFinanciere.info_price"=> 'required|integer',
            "InfoFinanciere.info_rent"=> 'required|integer',
            "InfoFinanciere.info_rent_encadrement"=> 'required|boolean',
            "InfoFinanciere.info_rent_default"=> 'required|integer',
            "InfoFinanciere.info_rent_majored"=> 'required|integer',
            "InfoFinanciere.info_rent_complement"=> 'required|integer',
            "InfoFinanciere.info_locative_charge_total"=> 'required|integer',
            "InfoFinanciere.info_locative_charge_format"=> 'required|string',
            "InfoFinanciere.info_honoraire_charge"=> 'required|array',
            "InfoFinanciere.info_estimation_value"=> 'required|integer',
            "InfoFinanciere.info_estimation_date"=> 'required|date',
            "InfoFinanciere.info_honoraire_locataire_part"=> 'required|array',
            "InfoFinanciere.info_honoraire_proprio_part"=> 'required|array',
            "InfoFinanciere.info_predicted_work"=> 'required|string',
            "InfoFinanciere.info_monthly_charge"=> 'required|integer',
            "InfoFinanciere.info_garantied_deposit"=> 'required|string',
            "InfoFinanciere.info_fonciere_taxe"=> 'required|integer',
            "InfoFinanciere.info_habitation_taxe"=> 'required|integer',
            "InfoFinanciere.info_ordure_menagere_taxe"=> 'required|integer'
        ];
    }
}