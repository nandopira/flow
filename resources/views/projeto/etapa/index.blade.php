@extends('layouts.classic.masterpage')


@section('content')

<style>
        .table-custom thead {
            background-color: #f0ad4e;
            color: white;
        }
        .table-custom tbody tr:hover {
            background-color: #f5f5f5;
        }
        .ui-jqgrid .ui-jqgrid-htable th {
        background-color: #f0ad4e;
        color: white;
    }
    .ui-jqgrid .ui-jqgrid-btable td {
        border: 1px solid #ddd;
    }
    .ui-jqgrid .ui-jqgrid-btable tr.jqgrow:hover {
        background-color: #f5f5f5;
    }
    </style>

<div class="container mt-3">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered table-custom" id="gridTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Ordem</th>
                <th>Fase</th>
                <th>Departamento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($etapas as $etapa)
                <tr>
                    <td>{{ $etapa->id }}</td>
                    <td>{{ $etapa->titulo }}</td>
                    <td>{{ $etapa->descricao }}</td>
                    <td>{{ $etapa->ordem }}</td>
                    <td>{{ $etapa->fase }}</td>
                    <td>{{ $etapa->dpto }}</td>
                    <td>
                        <a href="{{ route('etapa.edit', $etapa->id) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('etapa.destroy', $etapa->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Você tem certeza que deseja excluir esta etapa?')">Excluir</button>
                    </form>
                </td>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br><br>

</div>


</div>

@endsection