<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CommuneSearchService
{
    protected string $apiUrl = "https://api-adresse.data.gouv.fr/search/";

    public function __construct()
    {
    }

    public function getStreet(string $query)
    {
        $response = Http::get($this->apiUrl . "?q=$query&type=street&limit=5");

        return $response->json()['features'];
    }
}
