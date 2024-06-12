@extends('layouts.classic.masterpage')

@section('content')

<div class="ui-jqgrid-view" role="grid" style="width: 900px;">
        <div class="ui-widget-header ui-corner-top ui-jqgrid-titlebar ui-jqgrid-caption">
            <span class="ui-jqgrid-title">&nbsp&nbsp Formulário para Registro de Atendimento
            </span>
        </div>
        <div class="ui-state-default ui-corner-top ui-jqgrid-hdiv" style="width: 900px;">
            <div class="container mt-2">

    <form action="{{ route('atendimento.store') }}" method="POST">
        @csrf
        <input type="hidden" id="tipo" name="tipo" value="atendimento"> 
        <div class="form-group">
            <label for="Titulo">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" maxlength="200" placeholder="Digite o título da solicitação ou ocorrência..." required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" placeholder="Digite a descrição da solicitação ou ocorrência..." required></textarea>
        </div>
        <div class="form-group">
            <label for="createdby">Número USP</label>
            <input type="text" class="form-control" id="createdby" name="createdby" maxlength="15" placeholder="Digite seu número USP" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
    <br>

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