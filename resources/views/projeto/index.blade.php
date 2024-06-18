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
    .table-wrapper {
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
        width: 100%;
    }
    .dashboard {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
        width: 40%;
    }
    .search-wrapper {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }
    .input-group {
        flex-grow: 1;
        max-width: 400px;
        margin-top: 10px;
    }
    .card {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border-radius: 8px;
        padding: 10px;
        color: #fff;
        font-size: 1em;
        text-align: center;
        transition: background-color 0.3s ease; /* Add transition effect */
    }
    .card .number {
        font-size: 1.2em;
        font-weight: bold;
    }
    .card .label {
        font-size: 1em;
        margin-top: 10px;
    }
    .green { background-color: #86c88a; }
    .green:hover { background-color: #74b079; }
    .light-green { background-color: #a5d6a7; }
    .light-green:hover { background-color: #93c397; }
    .light-blue { background-color: #b3e5fc; }
    .light-blue:hover { background-color: #9fd8f8; }
    .grey { background-color: #b0bec5; }
    .grey:hover { background-color: #9aaab1; }
    .white { background-color: #eceff1; color: #000; }
    .white:hover { background-color: #dce3e6; }
    .orange { background-color: #ffcc80; }
    .orange:hover { background-color: #ffb74d; }
    .blue { background-color: #64b5f6; }
    .blue:hover { background-color: #42a5f5; }
    .dark-grey { background-color: #546e7a; }
    .dark-grey:hover { background-color: #455a64; }
    .checkbox-group {
        display: flex;
        gap: 10px;
        margin-bottom: 10px;
    }
</style>

<div class="d-flex align-items-center mb-3">
    <div class="dashboard">
        <div class="card green">
            <div class="number">0</div>
            <div class="label">Novos</div>
        </div>
        <div class="card light-green">
            <div class="number">2</div>
            <div class="label">Encaminhados</div>
        </div>
        <div class="card orange">
            <div class="number">24</div>
            <div class="label">Pendentes</div>
        </div>
        <div class="card blue">
            <div class="number">0</div>
            <div class="label">Finalizados</div>
        </div>      
    </div>
    <div class="search-wrapper ml-3">
        <div class="checkbox-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="cenaCheck">
                <label class="form-check-label" for="cenaCheck">
                    CENA
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="esalqCheck">
                <label class="form-check-label" for="esalqCheck">
                    ESALQ
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="puspLqCheck">
                <label class="form-check-label" for="puspLqCheck">
                    PUSP-LQ
                </label>
            </div>
        </div>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Buscar..." aria-label="Buscar" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button" id="button-addon2" style="width: 150px;">Buscar</button>
            </div>
        </div>
    </div>
</div>

<div class="table-wrapper">
    <table class="table table-bordered table-custom w-100 mr-3" id="projetoTable">
        <thead>
            <tr>
                <th onclick="sortTable(1)">Nome do Projeto</th>
                <th onclick="sortTable(2)">Descrição</th>
                <th onclick="sortTable(3)">Status</th>
                <th onclick="sortTable(4)">Fase</th>
                <th onclick="sortTable(5)">Demandante</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projetos as $projeto)
                <tr onclick="window.location='{{ route('projeto.show', $projeto->id) }}'">
                    <td>{{ $projeto->nome }}</td>
                    <td>{{ $projeto->descricao }}</td>
                    <td>{{ $projeto->status }}</td>
                    <td>{{ $projeto->fase }}</td>
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
