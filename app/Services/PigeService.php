<?php

namespace App\Services;

use App\Models\Agency;
use App\Models\Pige;
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
            $response = Http::get($this->apiUrl, ['key' => $apiKey, 'dept' => 68]);
            return ($response->json());
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Register or update pige into database
     *@param array $pige : the pige to be created or updated
     * @return void
     */

    public function createOrUpdatePige(array $pige): void
    {
        Pige::createOrUpdate($pige);
    }

    /**
     * Get the piges based on the agency from database
     * @param \App\Models\Agency $agency
     */

    public function getPigesFromDatabase(Agency $agency)
    {
        return Pige::agency($agency)->paginate(20);
    }
}
