<?php

namespace App\Services;

use App\Models\Agency;
use Exception;
use Illuminate\Support\Facades\Http;

class PigeService
{
    /**
     * The api url where getting the request
     * @protected string $apiUrl
     */

    public string $apiUrl;
    public function __construct()
    {
        $this->apiUrl = env("PIGE_ONLINE_API");
    }

    /**
     * Get the piges based on the api key of the agency
     * @param \App\Models\Agency $agency
     * @return mixed
     */
    public function getPiges(Agency $agency): mixed
    {
        $apiKey = $agency->pige_online_key;
        try {
            $response = Http::get($this->apiUrl, ['key' => $apiKey]);
            return ($response->json())['annonces'];
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
