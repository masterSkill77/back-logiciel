<?php

namespace App\Services;

use Carbon\Carbon;
use Exception;
use Google\Client;
use Google\Service\Calendar;
use Google\Service\Calendar\Event;
use Google\Service\Calendar\EventDateTime;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class GoogleCalendarService
{
    protected Client $client;
    public function __construct()
    {
        $this->client = new Client();
        $this->client->setApplicationName("MAPIM Immo Logiciel");
        $this->client->setAuthConfig(base_path() . '/client_secret.json');
        $this->client->addScope([Calendar::CALENDAR, Calendar::CALENDAR_EVENTS]);
    }

    public function synchronizeCalendar(int $agencyId)
    {
        $agency = (new AgencyService())->getById($agencyId);
        if ($agency && $agency->access_token) {
            $token =  $this->client->fetchAccessTokenWithRefreshToken($agency->refresh_token);
            $agency->access_token = $token['access_token'];
            $agency->save();
            $this->client->setAccessToken($token['access_token']);
            $calendar = new Calendar($this->client);
            $events = $calendar->events->listEvents('primary')->getItems();
        } else {
            $events = 'no_account';
        }
        return $events;
    }

    public function addEvent(int $agencyId, array $data)
    {
        $agency = (new AgencyService())->getById($agencyId);

        $token =  $this->client->fetchAccessTokenWithRefreshToken($agency->refresh_token);
        $agency->access_token = $token['access_token'];
        $agency->save();
        $this->client->setAccessToken($token['access_token']);
        $calendar = new Calendar($this->client);

        $event = new Event();
        $event->setDescription($data['event_description']);
        $event->setSummary($data['event_name']);
        // $event->setAttendees([[
        //     'email' => 'clairmont@saha-technology.com',
        //     'displayName' => 'Clairmont SAHA'
        // ]]);
        $endDate = (new EventDateTime());
        $endDate->setDateTime(Carbon::createFromDate($data['eventInfo']['end']));
        $startDate = (new EventDateTime());
        $startDate->setDateTime(Carbon::createFromDate($data['eventInfo']['start']));

        $event->setStart($startDate);
        $event->setEnd($endDate);
        $calendar->events->insert('primary', $event);
        return $calendar->events->listEvents('primary')->getItems();
    }

    public function removeEvent(string $eventId, int $agencyId)
    {
        $agency = (new AgencyService())->getById($agencyId);
        if ($agency && $agency->access_token) {
            $token =  $this->client->fetchAccessTokenWithRefreshToken($agency->refresh_token);
            $agency->access_token = $token['access_token'];
            $agency->save();
            $this->client->setAccessToken($token['access_token']);
            $calendar = new Calendar($this->client);
            $calendar->events->delete('primary', $eventId);
            $events = $calendar->events->listEvents('primary')->getItems();
            Cache::delete('calendar-' . $agencyId);
            Cache::put('calendar-' . $agencyId, $events);

            return $events;
        }
    }
}
