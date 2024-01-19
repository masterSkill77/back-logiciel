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
            $infoFinanciere = (new InfoFinanciere($params['InfoFinanciere']));
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
