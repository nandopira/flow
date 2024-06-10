<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Oauth2;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        $client = new Google_Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $client->addScope(Google_Service_Oauth2::USERINFO_EMAIL);
        $client->addScope(Google_Service_Oauth2::USERINFO_PROFILE);

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
        $client->setAccessToken($token);

        $oauth2 = new Google_Service_Oauth2($client);
        $google_user = $oauth2->userinfo->get();

        // Encontre ou crie um usuário no seu banco de dados
        $user = User::updateOrCreate(
            ['email' => $google_user->email],
            [
                'name' => $google_user->name,
                'email' => $google_user->email,
                'google_id' => $google_user->id,
                'avatar' => $google_user->picture
            ]
        );

        // Faça o login do usuário
        Auth::login($user);

        return redirect()->route('home',compact('google_user'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
