@extends('layouts.classic.masterpage')

@section('content')

<div class="ui-jqgrid-view" role="grid" style="width: 900px;">
        <div class="ui-widget-header ui-corner-top ui-jqgrid-titlebar ui-jqgrid-caption">
            <span class="ui-jqgrid-title">&nbsp&nbsp Formulário para Cadastro de Projeto
            </span>
        </div>
        <div class="ui-state-default ui-corner-top ui-jqgrid-hdiv" style="width: 900px;">
            <div class="container mt-2">

    <form action="{{ route('pessoa.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="numeroUSP">Número USP</label>
            <input type="text" class="form-control" id="numeroUSP" name="numeroUSP" maxlength="255" placeholder="Digite o número USP" required>
        </div>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" required></textarea>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Digite o nome" required></textarea>
        </div>
        <div class="form-group">
            <label for="celular">Celular</label>
            <input type="text" class="form-control" id="celular" name="celular" placeholder="Digite o nome" required></textarea>
        </div>           
        <div class="form-group">
            <label for="setor">Setor</label>
            <select class="form-control" id="setor" name="setor_id" required>
                <option value="">Selecione o Setor</option>
                @foreach($setores as $setor)
                    <option value="{{ $setor['codigo'] }}" {{ $setor['codigo'] == $setor['codigo'] ? 'selected' : '' }}>
                        {{ $setor['nome'] }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="dpto">Dpto</label>
            <select class="form-control" id="dpto" name="dpto_id" required>
                <option value="">Selecione a pessoa</option>
                @foreach($dptos as $dpto)
                    <option value="{{ $dpto['codigo']  }}" {{ $dpto['codigo']   == $dpto['codigo']  ? 'selected' : '' }}>
                        {{ $dpto['nome'] }}
                    </option>
                @endforeach
            </select>
        </div>    
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

    @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div id="successMessage" class="alert alert-success mt-3">{{ session('success') }}</div>
                @endif
    </div>

</div>
@endsection