<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Envolvido;
use App\Models\Tarefa;
use App\Models\Dpto;
use App\Models\Log;
use App\Models\Notificacao;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class AtendimentoController extends Controller
{
    public function index()
    {
        $atendimentos = Tarefa::where('tipo', 'atendimento')->get();;
        return view('atendimento.index', compact('atendimentos'));
    }

    public function atender($id)
    {
        $atendimento = Tarefa::findOrFail($id);
        
        $atendimento->atendente = '7023777'; // Atribui o usuário logado
        $atendimento->status = 'em atendimento'; // Atualiza o status
        $atendimento->save();      
        
        return $this->loadpage($id);
    }

    public function novaTarefa(Request $request, $id)
    {
        $atendimento = Tarefa::findOrFail($id);

        Tarefa::create([
            'superior' => $id,
            'titulo' => 'Nova tarefa de ' . $atendimento->titulo,
            'descricao' => $request->NovaTarefaDescricao,
            'createdby' => '7023777', //será número usp logado
            'dtprevini' => now(),
            'dtprevfim' => now()->addDays(3),
            'status' => 'novo',
            'tipo' => 'TAREFA'
        ]);

        Log::create([
            'table_name' => 'TAREFA',
            'foreign_id' => $id,
            'message' => 'Criado nova tarefa',
            'createdby' => '7023777',
            'nivel' => 'NORMAL',
            'event_type' => 'COMENTARIO',
            'ip_address' => $request->ip()
        ]);
        
        return $this->loadpage($id);
    }
 
    public function loadpage($id)
    {
        $atendimento = Tarefa::findOrFail($id);
        $solicitantes = Envolvido::where('tarefa_id', $id)->where('tipo', 'SOLICITANTE')->get();
        $atendentes = Envolvido::where('tarefa_id', $id)->where('tipo', 'ATENDENTE')->get();
        $observadores = Envolvido::where('tarefa_id', $id)->where('tipo', 'OBSERVADOR')->get();
        $envolvidos = Envolvido::where('tarefa_id', $id)->get();
               
        $logs = Log::where('foreign_id', $id)
        ->where('table_name', 'TAREFA')
        ->orderBy('id', 'desc') // Sort by ID in descending order
        ->get();

        $agendas = Agenda::where('foreign_id', $id)
        ->where('table_name', 'TAREFA')
        ->orderBy('id', 'desc') 
        ->get(); 

        $tarefas = Tarefa::where('superior', $id)
        ->where('tipo', 'TAREFA')
        ->orderBy('id', 'desc') 
        ->get();
        
        return view('atendimento.edit', compact('envolvidos','tarefas','atendimento', 'solicitantes','atendentes','observadores','logs','agendas'));

    }
  
    public function create()
    {
        $setores = Dpto::where('tipo', 'setor')->get();              
        return view('atendimento.create', compact('setores'));
    }

    public function store(Request $request)
    {      
          Tarefa::create([
            'superior' => $request->superior,
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'createdby' => $request->createdby,
            'dtprevini' => now(),
            'dtprevfim' => now()->addDays(3),
            'status' => 'novo',
            'tipo' => 'atendimento'
        ]);

        // Consulta do email do num_usp_atribuido na tabela Pessoa
        $pessoa = Pessoa::where('num_usp', $request->createdby)->first();

        if ($pessoa) {
            // Gravação na tabela EnviarEmails
            Notificacao::create([
                'titulo' => $request->titulo,
                'descricao' => $request->descricao,
                'emaildestino' => $pessoa->email,
                'mensagem' => 'Nova atendimento registrado: ' . $request->titulo
            ]);
        }

        return redirect()->back()->with('success', 'Registro salvo com sucesso!');
    }

    public function show($id)
    {
        $atendimento = Tarefa::findOrFail($id);
        return view('atendimento.show', compact('atendimento'));
    }

    public function edit($id)
    {
        // Suponha que temos uma lista de datas com suas disponibilidades
        $disponibilidades = [
            '2024-06-20' => 'disponível',
            '2024-06-21' => 'indisponível',
            '2024-06-22' => 'parcial'
        ];
        
        return $this->loadpage($id);
     }

    public function update(Request $request, $id)
    {
        $atendimento = Tarefa::findOrFail($id);
        //$atendimento->superior = $request->superior;
        //$atendimento->tipo = 'atendimento';
        //$atendimento->titulo = $request->titulo;
        //$atendimento->descricao = $request->descricao;
        $atendimento->num_usp_autor = $request->num_usp_autor;
        $atendimento->num_usp_atribuido = $request->num_usp_atribuido;
        $atendimento->dtprevini = $request->dtprevini;
        $atendimento->dtprevfim = $request->dtprevfim;
        $atendimento->save();

        return response()->json(['message' => 'Registro salvo com sucesso!']);
    }

    public function destroy($id)
    {
        $atendimento = Tarefa::findOrFail($id);
        $atendimento->delete();

        return response()->json(['message' => 'Registro apagado com sucesso!']);
    }
}

