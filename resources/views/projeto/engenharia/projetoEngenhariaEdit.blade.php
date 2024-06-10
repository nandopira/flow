@extends('layouts.classic.masterpage')

@section('content')
<div class="ui-jqgrid-view" role="grid" style="width: 900px;">
        <div class="ui-widget-header ui-corner-top ui-jqgrid-titlebar ui-jqgrid-caption">
            <span class="ui-jqgrid-title">&nbsp&nbsp Editar Projeto de Engenharia
            </span>
        </div>
        <div class="ui-state-default ui-corner-top ui-jqgrid-hdiv" style="width: 900px;">
            <div class="container mt-2">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('engenharia.update', $projeto->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-row">
    <div class="form-group col">
        <label for="dtprevini">Data Inicial Prevista</label>
        <input type="date" class="form-control" id="dtprevini" name="dtprevini" value="{{ old('dtprevini', $projeto->dtprevini) }}" >
    </div>

    <div class="form-group col">
        <label for="dtprevfim">Data Final Prevista</label>
        <input type="date" class="form-control" id="dtprevfim" name="dtprevfim" value="{{ old('dtprevfim', $projeto->dtprevfim) }}" >
    </div>
</div>

<div class="form-row">
    <div class="form-group col">
        <label for="ordemPCA">Ordem PCA</label>
        <input type="text" class="form-control" id="ordemPCA" name="ordemPCA" value="{{ old('ordemPCA', $projeto->ordemPCA) }}" required>
    </div>

    <div class="form-group col">
        <label for="ordemPlanObras">Ordem PLAN DE OBRAS</label>
        <input type="text" class="form-control" id="ordemPlanObras" name="ordemPlanObras" value="{{ old('ordemPlanObras', $projeto->ordemPlanObras) }}" required>
    </div>
	
	<div class="form-group col">
        <label for="pcaContratacao">PCA (CONTRATAÇÃO)</label>
        <input type="text" class="form-control" id="pcaContratacao" name="pcaContratacao" value="{{ old('pcaContratacao', $projeto->pcaContratacao) }}" required>
    </div>
</div>

<div class="form-row">
        <div class="form-group col">
            <label for="natureza">Natureza</label>
            <input type="text" class="form-control" id="natureza" name="natureza" value="{{ old('natureza', $projeto->natureza) }}" required>
        </div>

        <div class="form-group col">
            <label for="codigoSistemaAcropole">CÓDIGO SISTEMA ACRÓPOLE - SEF</label>
            <input type="text" class="form-control" id="codigoSistemaAcropole" name="codigoSistemaAcropole" value="{{ old('codigoSistemaAcropole', $projeto->codigoSistemaAcropole) }}" required>
        </div>

        <div class="form-group col">
            <label for="origemRecursos">Origem de Recursos</label>
            <input type="text" class="form-control" id="origemRecursos" name="origemRecursos" value="{{ old('origemRecursos', $projeto->origemRecursos) }}" required>
        </div>
</div>
<div class="form-row">
        <div class="form-group col">
            <label>Execução de Projetos e Doc. Técnica</label>
            <div>
                <label class="radio-inline">
                    <input type="radio" name="execucaoProjetos" value="Interna" {{ old('execucaoProjetos', $projeto->execucaoProjetos) == 'Interna' ? 'checked' : '' }}> Interna
                </label>
                <label class="radio-inline">
                    <input type="radio" name="execucaoProjetos" value="Terceiros" {{ old('execucaoProjetos', $projeto->execucaoProjetos) == 'Terceiros' ? 'checked' : '' }}> Terceiros
                </label>
            </div>
        </div>              

        <div class="form-group col">
            <label for="areaIntervencao">Área de Intervenção</label>
            <input type="text" class="form-control" id="areaIntervencao" name="areaIntervencao" value="{{ old('areaIntervencao', $projeto->areaIntervencao) }}" required>
        </div>
        <div class="form-group col">
            <label>Medida</label>
            <div>
                <label class="radio-inline">
                    <input type="radio" name="medida" value="M"> M
                </label>
                <label class="radio-inline">
                    <input type="radio" name="medida" value="M2"> M2
                </label>
                <label class="radio-inline">
                    <input type="radio" name="medida" value="UN"> UN
                </label>                
            </div>
        </div>
        </div>
<div class="form-row">
        <div class="form-group col">
            <label for="areaIntervencao">Tipo de Recurso</label>
            <input type="text" class="form-control" id="TipoDeRecurso" name="TipoDeRecurso" value="{{ old('areaIntervencao', $projeto->areaIntervencao) }}" required>
        </div>

        <div class="form-group col">
            <label for="areaIntervencao">Orçamento CODAGE</label>
            <input type="text" class="form-control" id="OrcamentoCODAGE" name="OrcamentoCODAGE" value="{{ old('areaIntervencao', $projeto->areaIntervencao) }}" required>
        </div>

        <div class="form-group col">
            <label for="areaIntervencao">Recurso Total</label>
            <input type="text" class="form-control" id="areaIntervencao" name="areaIntervencao" value="{{ old('areaIntervencao', $projeto->areaIntervencao) }}" required>
        </div>
        
        <div class="form-group col">
            <label for="areaIntervencao">Recurso Aprovado</label>
            <input type="text" class="form-control" id="areaIntervencao" name="areaIntervencao" value="{{ old('areaIntervencao', $projeto->areaIntervencao) }}" required>
        </div>
</div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
