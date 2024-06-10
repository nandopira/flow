<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Calendar;
use Illuminate\Support\Facades\Session;

class GoogleCalendarController extends Controller
{
    public function redirectToGoogle()
    {
        $client = new Google_Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $client->addScope(Google_Service_Calendar::CALENDAR);   

        $auth_url = $client->createAuthUrl();
        return redirect()->away($auth_url);
    }

    public function handleGoogleCallback(Request $request)
    {
        $client = new Google_Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $client->authenticate($request->get('code'));

        $token = $client->getAccessToken();
        Session::put('google_calendar_token', $token);

        return redirect()->route('events.create');
    }

    public function showCreateEventForm()
    {
        return view('create_event');
    }

    public function storeEvent(Request $request)
    {
        // Validar dados do request
        $request->validate([
            'activity' => 'required|string',
            'date' => 'required|date_format:Y-m-d\TH:i',
            'guest_email' => 'required|email',
        ]);

        // Adicionar logs para depuração
        \Log::info('Dados do Request: ', $request->all());

        $client = new Google_Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $client->setAccessToken(Session::get('google_calendar_token'));

        if ($client->isAccessTokenExpired()) {
            // O token de acesso expirou
            return redirect()->route('events.create')->with('error', 'O token de acesso do Google expirou.');
        }

        $service = new Google_Service_Calendar($client);

        $startDateTime = date('Y-m-d\TH:i:s', strtotime($request->date));
        $endDateTime = date('Y-m-d\TH:i:s', strtotime($request->date . ' +1 hour'));

        $event = new \Google_Service_Calendar_Event([
            'summary' => $request->activity,
            'start' => [
                'dateTime' => $startDateTime,
                'timeZone' => 'America/Sao_Paulo',
            ],
            'end' => [
                'dateTime' => $endDateTime,
                'timeZone' => 'America/Sao_Paulo',
            ],
            'attendees' => [
                ['email' => $request->guest_email],
            ],
        ]);

        $calendarId = 'primary';

        try {
            $event = $service->events->insert($calendarId, $event);
            \Log::info('Evento criado: ', ['htmlLink' => $event->htmlLink]);
            return redirect()->route('events.create')->with('success', 'Evento criado: ' . $event->htmlLink);
        } catch (\Google_Service_Exception $e) {
            \Log::error('Google Service Exception: ' . $e->getMessage());
            return redirect()->route('events.create')->with('error', 'Erro ao criar evento: ' . $e->getMessage());
        }
    }
}
