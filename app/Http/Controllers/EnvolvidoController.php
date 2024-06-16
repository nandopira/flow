<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AtendimentoController;

use Illuminate\Http\Request;

use App\Models\Envolvido;
//use App\Models\Log;
//use App\Models\Tarefa;
//use App\Models\Agenda;

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
        
        $atendimentoController = new AtendimentoController();
        return $atendimentoController->loadpage($id);
    }
}
