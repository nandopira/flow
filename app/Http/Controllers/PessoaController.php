<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\Setor;

use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function index()
    {
        $pessoas = Pessoa::all();
        return view('pessoa.index', compact('pessoas'));
    }

    public function create()
    {
        $setores = [
            ['codigo' => 'administrativo', 'nome' => 'Administrativo'],
            ['codigo' => 'engenharia', 'nome' => 'Engenharia'],
            ['codigo' => 'gestaoambiental', 'nome' => 'Gestão Ambiental'],
            ['codigo' => 'informatica', 'nome' => 'Informática'],
            ['codigo' => 'manutencao', 'nome' => 'Manutenção'],
            ['codigo' => 'seguranca', 'nome' => 'Segurança']
        ];

        $dptos = [
            ['codigo' => 'ESALQ', 'nome' => 'ESALQ'],
            ['codigo' => 'PUSPLQ', 'nome' => 'PUSP-LQ']
        ];

        return view('pessoa.create',compact('setores','dptos'));
    }

    public function store(Request $request)
    {      
        Pessoa::create([
            'numeroUSP' => $request->numeroUSP,
            'nome' => $request->nome,               
            'email' => $request->email,
            'celular' => $request->celular,
            'setor' => $request->setor,
            'dpto' => $request->dpto
        ]);

        return redirect()->back()->with('success', 'Registro salvo com sucesso!');
    }

    public function show($id)
    {
        $pessoa = Pessoa::findOrFail($id);
        return view('pessoa.show', compact('pessoa'));
    }

    public function edit($id)
    {
        $pessoa = Projeto::findOrFail($id);
        return view('pessoa.edit', compact('pessoa'));
    }

    public function update(Request $request, $id)
    {
        $pessoa = Pessoa::findOrFail($id);
        $pessoa->numUSP = $request->numUSP;
        $pessoa->nome = $request->nome;
        $pessoa->email = $request->email;
        $pessoa->celular = $request->celular;
        $pessoa->setor = $request->setor;
        $pessoa->dpto = $request->dpto;
        $pessoa->save();

        return response()->json(['message' => 'Registro salvo com sucesso!']);
    }

    public function destroy($id)
    {
        $pessoa = Pessoa::findOrFail($id);
        $pessoa->delete();

        return response()->json(['message' => 'Registro apagado com sucesso!']);
    }
}

