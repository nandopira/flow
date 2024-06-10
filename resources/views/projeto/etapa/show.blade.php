
@extends('layouts.classic.masterpage')

@section('content')
<div class="ui-jqgrid-view" role="grid" style="width: 900px;">
        <div class="ui-widget-header ui-corner-top ui-jqgrid-titlebar ui-jqgrid-caption">
            <span class="ui-jqgrid-title">&nbsp&nbsp Formulário para Edição de Etapas</span>
        </div>
        <div class="ui-state-default ui-corner-top ui-jqgrid-hdiv" style="width: 900px;">
            <div class="container mt-2">

    <form action="{{ route('etapa.update', $etapa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $etapa->titulo }}" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" required>{{ $etapa->descricao }}</textarea>
        </div>
        <div class="form-group">
            <label for="ordem">Ordem</label>
            <select class="form-control" id="ordem" name="ordem" required>
                <option value="">Selecione a ordem</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="fase">Fase</label>
            <select class="form-control" id="fase" name="fase" required>
                <option value="">Selecione a fase</option>
                <option value="fase 01">Fase 01</option>
                <option value="fase 02">Fase 02</option>
                <option value="fase 03">Fase 03</option>
            </select>
        </div>
        <div class="form-group">
            <label for="dpto">Departamento</label>
            <select class="form-control" id="dpto" name="dpto" required>
                <option value="">Selecione o departamento</option>
                <option value="ESALQ">ESALQ</option>
                <option value="PUSPLQ">PUSPLQ</option>
                <option value="DVEF">DVEF</option>
            </select>
</div>
    </form>
</div>
@endsection
