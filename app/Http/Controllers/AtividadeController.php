<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\Atividade;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class AtividadeController extends Controller
{
    public function index()
    {
        $atividades = Atividade::all();
        $projetos = Projeto::all();
        return view('projeto.atividade.index', compact('atividades','projetos'));
    }

    public function create()
    {
        $projetos = Projeto::all();
        $pessoas = Pessoa::all();
        
        return view('projeto.atividade.create', compact('projetos','pessoas'));
    }

    public function store(Request $request)
    {      
          Atividade::create([
            'projeto_uid' => $request->projeto_uid,
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'num_usp_autor' => $request->num_usp_autor,
            'num_usp_atribuido' => $request->num_usp_atribuido,
            'dtprevfim' => $request->dtprevfim
        ]);

// Consulta do email do num_usp_atribuido na tabela Pessoa
$pessoa = Pessoa::where('num_usp', $request->num_usp_atribuido)->first();

if ($pessoa) {
    // Gravação na tabela EnviarEmails
    EnviarEmails::create([
        'projeto_id' => $projeto->id,
        'email' => $pessoa->email,
        'mensagem' => 'Nova atividade atribuída no projeto: ' . $projeto->titulo
    ]);
}

        return redirect()->back()->with('success', 'Registro salvo com sucesso!');
    }

    public function show($id)
    {
        $atividade = Atividade::findOrFail($id);
        return view('projeto.atividade.show', compact('atividade'));
    }

    public function edit($id)
    {
        $atividade = Atividade::findOrFail($id);
        //$projetos = Projeto::where('setorResponsavel', 'engenharia')->get(); // Exemplo para selecionar projetos do setor de engenharia
        return view('projeto.atividade.edit', compact('atividade'));
    }

    public function update(Request $request, $id)
    {
        $atividade = Atividade::findOrFail($id);
        $atividade->projeto_uid = $request->projeto_uid;
        $atividade->titulo = $request->titulo;
        $atividade->descricao = $request->descricao;
        $atividade->num_usp_autor = $request->num_usp_autor;
        $atividade->num_usp_atribuido = $request->num_usp_atribuido;
        $atividade->dtprevfim = $request->dtprevfim;
        $atividade->save();

        return response()->json(['message' => 'Registro salvo com sucesso!']);
    }

    public function destroy($id)
    {
        $atividade = Atividade::findOrFail($id);
        $atividade->delete();

        return response()->json(['message' => 'Registro apagado com sucesso!']);
    }
}

