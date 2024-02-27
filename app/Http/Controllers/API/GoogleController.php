<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Google\GetAuthRequest;
use App\Services\GoogleAccountService;
use App\Services\GoogleCalendarService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function __construct(protected GoogleAccountService $googleServiceAccount, protected GoogleCalendarService $googleCalendarService)
    {
    }

    public function __invoke(GetAuthRequest $request)
    {
        $agencyId = Auth::user()->agency_id;
        $this->googleServiceAccount->addState($agencyId);
        return $this->googleServiceAccount->createAuthUrl();
    }

    public function callback(Request $request)
    {
        $code = $request->query('code');
        $state = $request->query('state');
        $accessToken = $this->googleServiceAccount->fetchAccessToken($code);

        $this->googleServiceAccount->updateAgencyAccount((int) $state, $accessToken);
        return response()->redirectTo(env('FRONTEND_URL_PUBLIC') . '/agenda');
    }

    public function synchronize()
    {
        $agencyId = Auth::user()->agency_id;
        $calendarEvents =  $this->googleCalendarService->synchronizeCalendar($agencyId);

        return response()->json($calendarEvents);
    }

    public function removeEvent(string $eventId)
    {
        $agencyId = Auth::user()->agency_id;
        $events = $this->googleCalendarService->removeEvent($eventId, $agencyId);
        return response()->json($events);
    }

    public function addEvent(Request $request)
    {
        $agencyId = Auth::user()->agency_id;
        $data = $request->all();
        $event = $this->googleCalendarService->addEvent($agencyId, $data);
        return response()->json($event);
    }
}
