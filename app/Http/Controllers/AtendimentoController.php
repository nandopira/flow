<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Models\Dpto;
use App\Models\Notificacao;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class AtendimentoController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::where('tipo', 'atendimento')->get();;
        return view('atendimento.index', compact('tarefas'));
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
            'num_usp_autor' => $request->num_usp_autor,
            'num_usp_atribuido' => $request->num_usp_atribuido,
            'dtprevini' => $request->dtprevini,
            'dtprevfim' => $request->dtprevfim,
            'tipo' => 'atendimento'
        ]);

        // Consulta do email do num_usp_atribuido na tabela Pessoa
        $pessoa = Pessoa::where('num_usp', $request->num_usp_atribuido)->first();

        if ($pessoa) {
            // Gravação na tabela EnviarEmails
            Notificacao::create([
                'titulo' => $request->titulo,
                'descricao' => $request->descricao,
                'emaildestino' => $pessoa->email,
                'mensagem' => 'Nova atividade atribuída no projeto: ' . $request->titulo
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
        $atendimento = Tarefa::findOrFail($id);
        //$projetos = Projeto::where('setorResponsavel', 'engenharia')->get(); // Exemplo para selecionar projetos do setor de engenharia
        return view('atendimento.edit', compact('atendimento'));
    }

    public function update(Request $request, $id)
    {
        $atendimento = Tarefa::findOrFail($id);
        $atendimento->superior = $request->superior;
        $atendimento->tipo = 'atendimento';
        $atendimento->titulo = $request->titulo;
        $atendimento->descricao = $request->descricao;
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

