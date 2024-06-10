@extends('layouts.classic.masterpage')

@section('content')

<div class="ui-jqgrid-view" role="grid" style="width: 900px;">
        <div class="ui-widget-header ui-corner-top ui-jqgrid-titlebar ui-jqgrid-caption">
            <span class="ui-jqgrid-title">&nbsp&nbsp Formulário para Cadastro de Etapas</span>
        </div>
        <div class="ui-state-default ui-corner-top ui-jqgrid-hdiv" style="width: 900px;">
            <div class="container mt-2">

    <form action="{{ route('etapa.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" maxlength="255" placeholder="Digite o título" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="5" placeholder="Digite a descrição" required></textarea>
        </div>
        <div class="form-group">
            <label for="fase">Fase</label>
            <select class="form-control" id="fase" name="fase" required>
                @foreach($fases as $fase)
                    <option value="{{ $fase->codigo }}">{{ $fase->descricao }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="dpto">Unidade</label>
            <select class="form-control" id="dpto" name="dpto" required>
                <option value="">Selecione a Unidade</option>
                <option value="ESALQ">ESALQ</option>
                <option value="PUSPLQ">PUSPLQ</option>
                <option value="DVEF">DVEF</option>
            </select>
        </div>
        <div class="form-group">
            <label for="linkup">Predecessora</label>
            <select class="form-control" id="linkup" name="linkup">
                <option value="">Selecione a ordem</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
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
