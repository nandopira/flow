<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Illuminate\Http\Request;

class ProjetoController extends Controller
{
    public function index()
    {
        $projetos = Projeto::all();
        return view('projeto.index', compact('projetos'));
    }

    public function create()
    {
        return view('projeto.projetoCreate');
    }

    public function store(Request $request)
    {      
          Projeto::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'setorResponsavel' => $request->setorResponsavel,
            'demandante' => $request->demandante,
            'dtprevini' => $request->dtprevini,
            'dtprevfim' => $request->dtprevfim,
            'dtini' => $request->dtini,
            'dtfim' => $request->dtfim,
            'orcamentoEstimado' => $request->orcamentoEstimado,
            'projectManager' => $request->projectManager,
        ]);

        return redirect()->back()->with('success', 'Registro salvo com sucesso!');
    }

    public function show($id)
    {
        $projeto = Projeto::findOrFail($id);
        return view('projeto.projetoDetalhe', compact('projeto'));
    }

    public function edit($id)
    {
        $projeto = Projeto::findOrFail($id);
        $projetos = Projeto::where('setorResponsavel', 'engenharia')->get(); // Exemplo para selecionar projetos do setor de engenharia
        return view('projeto.engenhariaEdit', compact('projeto', 'projetos'));
    }

    public function update(Request $request, $id)
    {
        $projeto = Projeto::findOrFail($id);
        $projeto->nome = $request->nome;
        $projeto->descricao = $request->descricao;
        $projeto->dtprevini = $request->dtprevini;
        $projeto->dtprevfim = $request->dtprevfim;
        $projeto->save();

        return response()->json(['message' => 'Registro salvo com sucesso!']);
    }

    public function destroy($id)
    {
        $projeto = Projeto::findOrFail($id);
        $projeto->delete();

        return response()->json(['message' => 'Registro apagado com sucesso!']);
    }
}

