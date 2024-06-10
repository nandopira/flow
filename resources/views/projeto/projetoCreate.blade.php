


@extends('layouts.classic.masterpage')

@section('content')

<div class="ui-jqgrid-view" role="grid" style="width: 900px;">
        <div class="ui-widget-header ui-corner-top ui-jqgrid-titlebar ui-jqgrid-caption">
            <span class="ui-jqgrid-title">&nbsp&nbsp Formulário para Cadastro de Projeto
            </span>
        </div>
        <div class="ui-state-default ui-corner-top ui-jqgrid-hdiv" style="width: 900px;">
            <div class="container mt-2">

    <form action="{{ route('projeto.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" maxlength="255" placeholder="Digite o nome do projeto" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="5" placeholder="Digite a descrição" required></textarea>
        </div>
        <div class="form-group">
            <label for="setorResponsavel">Setor</label>
            <select class="form-control" id="setorResponsavel" name="setorResponsavel" required>
                <option value=""></option>
                <option value="administrativo">Administrativo</option>
                <option value="engenharia">Engenharia</option>
                <option value="gestaoambiental">Gestão Ambiental</option>
                <option value="informatica">Informática</option>
                <option value="manutencao">Manutenção</option>
                <option value="seguranca">Segurança</option>
    </select>
        </div>
        <div class="form-group">
            <label for="demandante">Demandante</label>
            <select class="form-control" id="demandante" name="demandante" required>
                <option value="">Selecione o departamento</option>
                <option value="ESALQ">ESALQ</option>
                <option value="PUSPLQ">PUSP-LQ</option>
                <option value="DVEF">DVEF</option>
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