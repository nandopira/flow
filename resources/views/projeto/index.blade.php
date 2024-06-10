@extends('layouts.classic.masterpage')

@section('content')

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://uspdigital.usp.br/comumwebdev/imagens/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link href="https://uspdigital.usp.br/comumwebdev/libs/usp/main/1.0/menuweb.css" type="text/css" rel="stylesheet">
<style>
    .table-custom thead {
        background-color: #f0ad4e;
        color: white;
        cursor: pointer;
    }
    .table-custom tbody tr:hover {
        background-color: #f5f5f5;
    }
</style>

<div class="container mt-3">
    <h2 class="mb-4">Lista de Projetos</h2>
    <table class="table table-bordered table-custom" id="projetoTable">
        <thead>
            <tr>
                <th onclick="sortTable(1)">Nome do Projeto</th>
                <th onclick="sortTable(2)">Descrição</th>
                <th onclick="sortTable(3)">Setor</th>
                <th onclick="sortTable(4)">Demandante</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projetos as $projeto)
                <tr onclick="window.location='{{ route('projeto.show', $projeto->id) }}'">
                    <td>{{ $projeto->nome }}</td>
                    <td>{{ $projeto->descricao }}</td>
                    <td>{{ $projeto->setorResponsavel }}</td>
                    <td>{{ $projeto->demandante }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("projetoTable");
        switching = true;
        dir = "asc"; 
        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount ++;      
            } else {
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
</script>

@endsection
