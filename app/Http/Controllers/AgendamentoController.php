<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function index()
    {
         // Suponha que temos uma lista de datas com suas disponibilidades
         $disponibilidades = [
            '2024-06-20' => 'disponível',
            '2024-06-21' => 'indisponível',
            '2024-06-22' => 'parcial'
        ];

        return view('agendamento.create', compact('disponibilidades'));
    }

    public function create()
    {
        // Suponha que temos uma lista de datas com suas disponibilidades
        $disponibilidades = [
            '2024-06-20' => 'disponível',
            '2024-06-21' => 'indisponível',
            '2024-06-22' => 'parcial'
        ];

        return view('agendamento.create', compact('disponibilidades'));
    }
}
