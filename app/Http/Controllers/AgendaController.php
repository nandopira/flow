<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;
use App\Models\Log;
use App\Models\Agenda;

class AgendaController extends Controller
{
    
    public function index()
    {
         // Suponha que temos uma lista de datas com suas disponibilidades
         $disponibilidades = [
            '2024-06-20' => 'disponível',
            '2024-06-21' => 'indisponível',
            '2024-06-22' => 'parcial'
        ];

        return view('agenda.create', compact('disponibilidades'));
    }

    public function create()
    {
        // Suponha que temos uma lista de datas com suas disponibilidades
        $disponibilidades = [
            '2024-06-20' => 'disponível',
            '2024-06-21' => 'indisponível',
            '2024-06-22' => 'parcial'
        ];

        return view('agenda.create', compact('disponibilidades'));
    }

    public function store(Request $request)
    {
        $atendimento = Tarefa::findOrFail($request->atendimento_id);

        Agenda::create([
            'foreign_id' => $request->atendimento_id,
            'table_name' => $request->table_name,
            'createdby' => '7023777', //será número usp logado
            'proprietario' => '7023777', //será número usp logado
            'data_agendada' => $request->datetimeAgenda,
            'event_type' => 'TAREFA',   
            'ip_address' => $request->ip()
        ]);

/***    Log::create([
            'table_name' => 'AGENDA',
            'foreign_id' => $id,
            'message' => $request->table_name + ' agendada',
            'createdby' => '7023777',
            'nivel' => 'NORMAL',
            'event_type' => 'AGENDA',
            'ip_address' => $request->ip()
        ]);
***/
        
        $logs = Log::where('foreign_id', $request->atendimento_id)->where('table_name', 'TAREFA')->get();
        return view('atendimento.edit', compact('atendimento','logs'));
    }
}
