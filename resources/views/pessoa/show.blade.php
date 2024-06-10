@extends('layouts.classic.masterpage')

@section('content')
<div class="ui-jqgrid-view" role="grid" style="width: 900px;">
    <div class="ui-widget-header ui-corner-top ui-jqgrid-titlebar ui-jqgrid-caption">
        <span class="ui-jqgrid-title">&nbsp;&nbsp;Detalhes do Projeto</span>
    </div>
    <div class="ui-state-default ui-corner-top ui-jqgrid-hdiv" style="width: 900px;">
        <div class="container mt-2">
            <div class="form-group">
                <label for="nome">Atividade</label>
                <p class="form-control-static">{{ $atividade->nome }}</p>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <p class="form-control-static">{{ $atividade->descricao }}</p>
            </div>
            <div class="form-group">
                <label for="projeto">Projeto</label>
                <p class="form-control-static">{{ $atividade->projeto->nome }}</p>
            </div>
            <div class="form-group">
                <label for="pessoa">Atribuir</label>
                <p class="form-control-static">{{ $atividade->pessoa->nome }} - {{ $atividade->pessoa->dpto }}</p>
            </div>
            <div class="form-group">
                <label for="dtprevfim">Previsão de Término:</label>
                <p class="form-control-static">{{ $atividade->dtprevfim ? $atividade->dtprevfim->format('d/m/Y') : 'N/A' }}</p>
            </div>
            <a href="{{ route('atividades.edit', $atividade->id) }}" class="btn btn-primary">Editar</a>
        </div>
    </div>
</div>
@endsection
