<?php

namespace App\Services;

use App\Models\InfoFinanciere;

class InfoFinanciereService
{
    public function __construct()
    {
        // Constructor of the class
    }

    /**
     * Create a new infoFinanciere row
     * @param array $params
     * @return \App\Models\InfoFinanciere
     */
    public function createInfoFinanciere(array $params): int
    {
        if(isset($params['InfoFinanciere']) && is_array($params['InfoFinanciere'])) {
            $infoFinanciereData = $params['InfoFinanciere'];
            
            $infoFinanciereData['info_rent_encadrement'] = json_encode($infoFinanciereData['info_rent_encadrement']);
            $infoFinanciereData['info_tenant_chare'] = json_encode($infoFinanciereData['info_tenant_chare']);
            $infoFinanciereData['info_owner_share'] = json_encode($infoFinanciereData['info_owner_share']);
    
            $infoFinanciereData['info_honoraire_charge'] = $infoFinanciereData['info_honoraire_charge'] ? 1 : 0;
            $infoFinanciereData['info_honoraire_locataire_part'] = $infoFinanciereData['info_honoraire_locataire_part'] ? 1 : 0;
        
            $infoFinanciereData['info_estimation_date'] = date('Y-m-d', strtotime($infoFinanciereData['info_estimation_date']));
            $infoFinanciere = new InfoFinanciere($infoFinanciereData);
            $infoFinanciere->save();
            
            return $infoFinanciere->id;
        }
        return 0;
    }
    
    
    

    /**
     * Update an infoFinanciere row based on infoId
     * @param \App\Models\InfoFinanciere $infoFinanciere
     * @param array $params
     * @return \App\Models\InfoFinanciere
     */

    public function updateInfoFinanciere(InfoFinanciere $infoFinanciere, array $params): InfoFinanciere
    {
        $infoFinanciere->update($params);
        return $infoFinanciere;
    }
}
