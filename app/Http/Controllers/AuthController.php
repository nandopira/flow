<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{

      public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        // Buscar o usuário pelo e-mail, se não existir, criar um novo
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'password' => bcrypt(str_random(16)) // você pode usar outra abordagem para a senha
            ]
        );

        // Logar o usuário
        Auth::login($user, true);

        return redirect('/');
    }



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function getToken()
    {
        $client = new Client();
        
        try {
            $response = $client->post('https://rhsso.idp-hml.sp.gov.br/auth/realms/idpsp/protocol/openid-connect/token', [
                'form_params' => [
                    'client_id' => 'sde-GestãoPUSP-LQ',
                    'client_secret' => 'xxxxxxxx',
                    'grant_type' => 'client_credentials'
                ]
            ]);

            $body = $response->getBody();
            $data = json_decode($body, true);

            // Retorne a resposta para a view
            return view('auth.token', ['data' => $data]);

        } catch (ClientException $e) {
            // Trate a exceção e retorne a mensagem de erro para a view
            return view('auth.token', ['error' => $e->getMessage()]);
        }
    }
}
