<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etapa;
use App\Models\Fase;

class EtapaController extends Controller
{
    public function index()
    {
        $etapas = Etapa::all();
        return view('projeto.etapa.index', compact('etapas'));
    }

    public function create()
    {
        $fases = Fase::all();

        return view('projeto.etapa.create', compact('fases'));
    }

    public function store(Request $request)
    {      
       
          Etapa::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'ordem' => $request->ordem,
            'fase' => $request->fase,
            'dpto' => $request->dpto,
        ]);

        return redirect()->back()->with('success', 'Registro salvo com sucesso!');
    }

    public function show($id)
    {
        $etapa = Etapa::findOrFail($id);
        return view('projeto.etapa.show', compact('etapa'));
    }

    public function edit($id)
    {
        $etapa = Etapa::findOrFail($id);
        return view('projeto.etapa.edit', compact('etapa'));
    }

    public function update(Request $request, $id)
    {
        $etapa = Etapa::findOrFail($id);
        $etapa->titulo = $request->titulo;
        $etapa->descricao = $request->descricao;
        $etapa->ordem = $request->ordem;
        $etapa->fase = $request->fase;
        $etapa->dpto = $request->dpto;
        $etapa->save();

        return redirect()->back()->with('success', 'Registro salvo com sucesso!');
    }

    public function destroy($id)
    {
        $etapa = Etapa::findOrFail($id);
        $etapa->delete();

        return redirect()->back()->with('success', 'Registro salvo com sucesso!');
    }

}
