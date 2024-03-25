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

            "InfoFinanciere.info_price" => 'nullable',
            "InfoFinanciere.info_honoraire_charge" => 'nullable|boolean',
            "InfoFinanciere.info_honoraire_locataire_part" => 'nullable|boolean',
            "InfoFinanciere.info_rent" => 'nullable',
            "InfoFinanciere.info_rent_encadrement" => 'nullable|array',
            "InfoFinanciere.info_tenant_chare" => 'nullable|array',
            "InfoFinanciere.info_owner_share" => 'nullable|array',
            "InfoFinanciere.info_locative_charge_total" => 'nullable',
            "InfoFinanciere.info_locative_charge_format" => 'nullable|string',
            "InfoFinanciere.info_locative_charge_information" => 'nullable|string',
            "InfoFinanciere.info_estimation_value" => 'nullable',
            "InfoFinanciere.info_estimation_date" => 'nullable|date',
            "InfoFinanciere.info_predicted_work" => 'nullable|string',
            "InfoFinanciere.info_monthly_charge" => 'nullable',
            "InfoFinanciere.info_garantied_deposit" => 'nullable|string',
            "InfoFinanciere.info_fonciere_taxe" => 'nullable',
            "InfoFinanciere.info_habitation_taxe" => 'nullable',
            "InfoFinanciere.info_ordure_menagere_taxe" => 'nullable',
        ];
    }
}
