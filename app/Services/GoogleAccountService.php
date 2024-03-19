<?php

namespace App\Services;

use Google\Client;
use Google\Service\Calendar;

class GoogleAccountService
{
    protected Client $client;
    public function __construct()
    {
        $this->client = new Client();
        $this->client->setApplicationName("MAPIM Immo Logiciel");
        $this->client->setAuthConfig(base_path() . '/client_secret.json');
        $redirect_uri = env('GOOGLE_REDIRECT');
        $this->client->setRedirectUri($redirect_uri);
        $this->client->setApprovalPrompt('force');
        $this->client->setAccessType('offline');
        $this->client->addScope([Calendar::CALENDAR, Calendar::CALENDAR_EVENTS]);
    }

    public function addState(int $state): void
    {
        $this->client->setState((string) $state);
    }

    public function createAuthUrl(): string
    {
        return $this->client->createAuthUrl();
    }

    public function fetchAccessToken(string $code): array
    {
        return  $this->client->fetchAccessTokenWithAuthCode($code);
    }

    public function fetchAccessTokenWithRefresh(string $refresh): array
    {
        return  $this->client->fetchAccessTokenWithRefreshToken($refresh);
    }

    public function updateAgencyAccount(int $agencyId, array $accessToken): void
    {
        $agencyService = new AgencyService();
        $agency = $agencyService->getById($agencyId);
        $agency->access_token = $accessToken['access_token'];
        $agency->refresh_token = $accessToken['refresh_token'];
        $agency->save();
    }
}
