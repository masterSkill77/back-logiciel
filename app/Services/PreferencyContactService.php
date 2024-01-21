<?php

namespace App\Services;

use App\Models\PreferenceContacts;

class PreferencyContactService
{
    public function store(array $params) : int
    {
        if(isset($params['preferencyContact']) && is_array($params['preferencyContact'])){
            $preferencyContact = (new PreferenceContacts($params['preferencyContact']));
            $preferencyContact->save();
            return $preferencyContact->id;
        }

        return 0;
    }
}