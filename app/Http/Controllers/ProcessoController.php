<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ProcessoController extends Controller
{
    public function showForm()
    {
        return view('consulta-processo');
    }

    public function consultaProcesso()
    {
        $numero = '009.00000607/2024-21';
        // Descobrir endpoints
        $discoveryEndpoint = env('SEI_DISCOVERY_ENDPOINT');
        $client = new Client();
        $response = $client->get($discoveryEndpoint);
        $config = json_decode($response->getBody()->getContents(), true);

        // Obter Token
        $tokenResponse = $client->post('https://rhsso.idp-hml.sp.gov.br/auth/realms/idpsp/protocol/openid-connect/token', [
            'form_params' => [
                'client_id' => 'sde-GestãoPUSP-LQ',
                'client_secret' => 'xxxxxxxxxxxx',
                'grant_type' => 'client_credentials'
            ]
        ]);       

        $tokenData = json_decode($tokenResponse->getBody()->getContents(), true);
        $accessToken = $tokenData['access_token'];

        // Consultar o processo no SEI
        $apiBaseUrl = env('SEI_API_BASE_URL');
        $processoResponse = $client->get($apiBaseUrl . '/processo/' . $numero, [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
            ],
        ]);

        //$processoData = json_decode($processoResponse->getBody()->getContents(), true);
        $processoData = $processoResponse;

        // Retornar dados do processo
        return view('resultado-processo', ['processoData' => $processoData]);
    }
}
