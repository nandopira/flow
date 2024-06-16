<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Envolvido;
use App\Models\Log;
use App\Models\Tarefa;
use App\Models\Agenda;

class EnvolvidoController extends Controller
{
    //

    public function store(Request $request)
    {
        //$atendimento = Tarefa::findOrFail($request->atendimento_id);
        $id = $request->atendimento_id;

        Envolvido::create([
            'tarefa_id' => $request->atendimento_id,
            'tipo' => $request->papelEnvolvido,
            'numeroUSP' => $request->envolvidoNumUSP
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
        
$atendimento = Tarefa::findOrFail($id);
$solicitantes = Envolvido::where('tarefa_id', $id)->where('tipo', 'SOLICITANTE')->get();
$atendentes = Envolvido::where('tarefa_id', $id)->where('tipo', 'ATENDENTE')->get();
$observadores = Envolvido::where('tarefa_id', $id)->where('tipo', 'OBSERVADOR')->get();
$envolvidos = Envolvido::where('tarefa_id', $id)->get();
$logs = Log::where('foreign_id', $id)->where('table_name', 'TAREFA')->get(); 
$agendas = Agenda::where('foreign_id', $id)->where('table_name', 'TAREFA')->get(); // Exemplo para selecionar projetos do setor de engenharia
$tarefas = Tarefa::where('superior', $id)->where('tipo', 'TAREFA')->get();
return view('atendimento.edit', compact('envolvidos','tarefas','atendimento', 'solicitantes','atendentes','observadores','logs','agendas'));

    }


}
