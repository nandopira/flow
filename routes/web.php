<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AtividadeController;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\DptoController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\EtapaController;
use App\Http\Controllers\FaseController;
use App\Http\Controllers\ProjetoEngenhariaController;
use App\Http\Controllers\GoogleCalendarController;
use App\Http\Controllers\ProcessoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\AtendimentoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/painel', function () {
    return view('painel');
});


Route::get('/teste', function () {
    return view('teste');
});

Route::get('/det', function () {
    return view('projeto.projetoDetalhe');
});

Route::get('/mapa', function () {
    return view('obra.mapa');
})->name('obra.mapa');

Route::get('/credito', function () {
    return view('credito');
})->name('credito');

Route::get('/engenharia/edit', function () {
    return view('projeto.engenhariaEdit');
})->name('engenharia.edit');

Route::resource('atividade', AtividadeController::class);
Route::resource('engenharia', ProjetoEngenhariaController::class);
Route::resource('fase', FaseController::class);
Route::resource('etapa', EtapaController::class);
Route::resource('projeto', ProjetoController::class);
Route::resource('dpto', DptoController::class);
Route::resource('pessoa', PessoaController::class);
Route::resource('atendimento', AtendimentoController::class);
Route::get('/atender/{id}', [AtendimentoController::class, 'atender'])->name('atendimento.atender');

  
Route::get('create-event', [GoogleCalendarController::class, 'showCreateEventForm'])->name('events.create');
Route::post('store-event', [GoogleCalendarController::class, 'storeEvent'])->name('events.store');

Route::get('/consulta-processo/{numero}', [ProcessoController::class, 'consultaProcesso']);
Route::get('/consulta-processo', [ProcessoController::class, 'showForm']);
Route::post('/consulta-processo', [ProcessoController::class, 'consultaProcesso']);

Route::get('/get-token', [AuthController::class, 'getToken']);

//Route::get('/', function () {
//    return view('index');
//})->middleware('auth');

Route::get('/login', function () {
    return view('create_event'); // Supondo que esta é a view de login que contém o botão do Google
})->name('login');

//Route::get('/auth/google', function () {
//    return Socialite::driver('google')->redirect();
//})->name('login.google');


//Route::get('auth/google', [GoogleCalendarController::class, 'redirectToGoogle']);
//Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
Route::get('auth/google', [GoogleCalendarController::class, 'redirectToGoogle']);
//Route::get('auth/google/callback', [GoogleCalendarController::class, 'handleGoogleCallback']);

Route::get('/', function () {
    return view('index');
});

Route::get('login/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback'])->name('google.callback');
Route::post('logout', [GoogleAuthController::class, 'logout'])->name('logout');