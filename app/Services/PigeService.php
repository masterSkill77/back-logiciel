<?php

namespace App\Services;

use App\Models\Agency;
use App\Models\Pige;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PigeService
{
    /**
     * The api url where getting the request
     * @protected string $apiUrl
     */

    public string $apiUrl;
    protected $apiKey = '';
    public function __construct()
    {
        $this->apiUrl = env("PIGE_ONLINE_API");
        $this->apiKey = env('PIGE_ONLINE_API_KEY');
    }

    /**
     * Get the piges based on the api key of the agency
     * @return mixed
     */
    public function getPiges(): mixed
    {
        try {
            $response = Http::get($this->apiUrl, ['key' => $this->apiKey]);
            return ($response->json())['annonces'];
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Register or update pige into database
     *@param array $pige : the pige to be created or updated
     * @return void
     */

    public function createOrSkip(array $pige): void
    {
        $thePige = Pige::where('id', $pige['id'])->first();
        if (!$thePige) {
            $currentPige = new Pige($pige);
            $currentPige->annonceur = json_encode($pige['annonceur']);
            $currentPige->prix_evolution = json_encode($pige['prix_evolution']);
            $currentPige->sources = json_encode($pige['sources']);

            $currentPige->save();
        }
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
