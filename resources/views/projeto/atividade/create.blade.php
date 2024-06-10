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
            <label for="nome">Atividade</label>
            <input type="text" class="form-control" id="nome" name="nome" maxlength="255" placeholder="Digite o nome do projeto" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="5" placeholder="Digite a descrição" required></textarea>
        </div>
        <div class="form-group">
        <label for="projeto">Projeto</label>
            <select class="form-control" id="projeto" name="projeto_id" required>
                <option value="">Selecione o projeto</option>
                @foreach($projetos as $projeto)
                    <option value="{{ $projeto->id }}" {{ $projeto->id == $projeto->id ? 'selected' : '' }}>
                        {{ $projeto->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <label for="pessoa">Atribuir</label>
            <select class="form-control" id="pessoa" name="pessoa_id" required>
                <option value="">Selecione a pessoa</option>
                @foreach($pessoas as $pessoa)
                    <option value="{{ $pessoa->numeroUSP }}" {{ $pessoa->numeroUSP == $pessoa->numeroUSP ? 'selected' : '' }}>
                        {{ $pessoa->nome }} - {{ $pessoa->dpto }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="dtprevfim">Previsão de Término:</label>
            <input type="date" class="form-control" id="dtprevfim" name="dtprevfim" value="{{ old('dtprevfim', $projeto->dtprevfim) }}" >
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