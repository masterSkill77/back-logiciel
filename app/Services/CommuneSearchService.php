<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CommuneSearchService
{
    protected string $apiUrl = "https://api-adresse.data.gouv.fr/search/";

    protected string $apirUrlGlobalCountry = "https://restcountries.com/v3.1/";

    public function __construct()
    {
    }

    public function getStreet(string $query)
    {
        $response = Http::get($this->apiUrl . "?q=$query&type=street&limit=5");

        return $response->json()['features'];
    }

    public function getCountryName(string $name)
    {
        if ($name === null) {
            return null;
        }
    
        $reponse = Http::get($this->apirUrlGlobalCountry. "name/$name");

        return $reponse->json();
    }
}
