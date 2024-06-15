<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Models\Notificacao;
use App\Models\Log;
use App\Models\Pessoa;

use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        $logs = Log::where('table_name', 'LOG')->get();;
        return view('log.index', compact('logs'));
    }

    public function storeTask(Request $request) //storeLog -> alterar
    {      
          Log::create([
            'table_name' => $request->table_name,
            'foreign_id' => $request->id,
            'message' => $request->interacao,
            'createdby' => '7023777',
            'nivel' => 'NORMAL',
            'event_type' => 'COMENTARIO',
            'ip_address' => $request->ip()
        ]);

        // Consulta do email do num_usp_atribuido na tabela Pessoa
        //$pessoa = Pessoa::where('num_usp', $request->usuario)->first();
/* 
        if ($pessoa) {
            // Gravação na tabela EnviarEmails
            Notificacao::create([
                'titulo' => $request->titulo,
                'descricao' => $request->descricao,
                'emaildestino' => $pessoa->email,
                'mensagem' => 'Nova comentário registrado: ' . $request->titulo
            ]);
        }
*/

        return redirect()->back()->with('success', 'Registro salvo com sucesso!');
    }

    public function show($id)
    {
        $log = Log::findOrFail($id);
        return view('log.show', compact('log'));
    }

    public function destroy($id)
    {
        $log = Log::findOrFail($id);
        $log->delete();

        return response()->json(['message' => 'Registro apagado com sucesso!']);
    }

}
