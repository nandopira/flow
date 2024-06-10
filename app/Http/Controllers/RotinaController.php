<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rotina;

use Illuminate\Support\Facades\Log;

class RotinaController extends Controller
{
    
    public function index()
    {
        $fases = Fase::all();
        return view('projeto.fase.index', compact('fases'));
    }

    public function create()
    {
        return view('projeto.fase.create');
    }

    public function store(Request $request)
    {        
          Fase::create([
            'codigo' => $request->codigo,
            'descricao' => $request->descricao,
            'cor' => $request->cor,
            'autor' => $request->autor,
            'linkup' => $request->linkup,
        ]);

        return redirect()->back()->with('success', 'Registro salvo com sucesso!');
    }

    public function show($id)
    {
        $fase = Fase::findOrFail($id);
        return view('projeto.fase.show', compact('fase'));
    }

    public function edit($id)
    {
        $fase = Fase::findOrFail($id);
        return view('projeto.fase.edit', compact('fase'));
    }

    public function update(Request $request, $id)
    {
        $fase = Fase::findOrFail($id);
        $fase->codigo = $request->titulo;
        $fase->descricao = $request->descricao;
        $fase->cor = $request->cor;
        $fase->autor = $request->autor;
        $fase->linkup = $request->linkup;
        $fase->save();

        return response()->json(['message' => 'Registro salvo com sucesso!']);
    }

    public function destroy($id)
    {
        $fase = Fase::findOrFail($id);
        $fase->delete();

        return response()->json(['message' => 'Registro apagado com sucesso!']);
    }

}
