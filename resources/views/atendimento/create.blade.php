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
            <label for="nome">Descrição</label>
            <textarea class="form-control" id="nome" name="nome" placeholder="Digite o nome" required></textarea>
        </div>
        <div class="form-group">
            <label for="numeroUSP">Número USP</label>
            <input type="text" class="form-control" id="numeroUSP" name="numeroUSP" maxlength="255" placeholder="Digite o número USP" required>
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