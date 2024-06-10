<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DptoController extends Controller
{
    public function index()
    {
        $projetos = Dpto::all();
        return view('projeto.etapa.index', compact('dptos'));
    }

    public function create()
    {
        return view('projeto.etapa.create');
    }

    public function store(Request $request)
    {        
          Projeto::create([
            'codigo' => $request->codigo,
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'unidade' => $request->unidade,
            'superior' => $request->superior,
        ]);

        return redirect()->back()->with('success', 'Registro salvo com sucesso!');
    }

    public function show($id)
    {
        $projeto = Dpto::findOrFail($id);
        return view('projeto.etapa.show', compact('dptos'));
    }

    public function edit($id)
    {
        $projeto = Dpto::findOrFail($id);
        return view('projeto.etapa.edit', compact('dptos'));
    }

    public function update(Request $request, $id)
    {
        $projeto = Dpto::findOrFail($id);
        $projeto->titulo = $request->titulo;
        $projeto->descricao = $request->descricao;
        $projeto->dtprevini = $request->dtprevini;
        $projeto->dtprevfim = $request->dtprevfim;
        $projeto->save();

        return response()->json(['message' => 'Registro salvo com sucesso!']);
    }

    public function destroy($id)
    {
        $projeto = Dpto::findOrFail($id);
        $projeto->delete();

        return response()->json(['message' => 'Registro apagado com sucesso!']);
    }

}
