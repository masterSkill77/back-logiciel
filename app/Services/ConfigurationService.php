<?php

namespace App\Services;

use App\Models\Configuration;

class ConfigurationService
{
    public function __construct()
    {
        // Constructor of the class
    }

    public function createConfiguration(string $postalCode)
    {
        $configuration = new Configuration();
        $configuration->code_postal = $postalCode;

        return $configuration;
    }


    public function removeConfiguration(int $configurationId)
    {
        $configuration = Configuration::where('id', $configurationId)->first();

        $allPostalCodes = Configuration::where('code_postal', $configuration->code_postal);

        $allPostalCodes->delete();
        $configuration->delete();

        return $configuration;
    }
}
