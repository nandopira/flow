
@extends('layouts.classic.masterpage')

@section('content')
<div class="ui-jqgrid-view" role="grid" style="width: 900px;">
        <div class="ui-widget-header ui-corner-top ui-jqgrid-titlebar ui-jqgrid-caption">
            <span class="ui-jqgrid-title">&nbsp&nbsp Formulário para Edição de Etapas</span>
        </div>
        <div class="ui-state-default ui-corner-top ui-jqgrid-hdiv" style="width: 900px;">
            <div class="container mt-2">
            <p><strong>Código:</strong> {{ $fase->codigo }}</p>
        <p><strong>Descriçãp:</strong> {{ $fase->descricao }}</p>
        <p><strong>Autor:</strong> {{ $fase->autor }}</p>
        <p><strong>Cor:</strong> {{ $fase->cor }}</p>
        <p><strong>Link up:</strong> {{ $fase->linkup }}</p>
        <p><strong>Criado em:</strong> {{ $fase->datecreate }}</p>
        <p><strong>Alterado em:</strong> {{ $fase->dateupdate }}</p>

  </div>
    </form>
</div>
@endsection



{{ $fase->titulo }}