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
                <th>Atividade</th>
                <th>Status</th>
                <th>Previsão</th>
                <th>Atribuido</th>
                <th>Projeto</th>
                <th>Ação</th>
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
                        <a href="{{ route('atividade.edit', $etapa->id) }}" class="btn btn-primary btn-sm">Editar</a>
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