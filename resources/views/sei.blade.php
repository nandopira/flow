<?php 

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

$client = new Client();

try {
    $response = $client->post('https://rhsso.idp-hml.sp.gov.br/auth/realms/idpsp/protocol/openid-connect/token', [
        'form_params' => [
            'client_id' => 'seu_client_id',
            'client_secret' => 'seu_client_secret',
            'grant_type' => 'client_credentials'
        ]
    ]);

    $body = $response->getBody();
    $data = json_decode($body, true);
    // Use a resposta conforme necessário
} catch (ClientException $e) {
    // Trate a exceção conforme necessário
    echo $e->getMessage();
}
