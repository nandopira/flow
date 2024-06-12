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

.dashboard {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 10px;
    width: 40%;
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

    </style>

<div class="container mt-3">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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

<br>

    <table class="table table-bordered table-custom" id="gridTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Atendimento</th>
                <th>Status</th>
                <th>Registrado</th>
                <th>Atribuido</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($atendimentos as $atendimento)
                <tr>
                    <td>{{ $atendimento->count }}</td>
                    <td>{{ $atendimento->titulo ?? $atendimento->descricao }}</td>
                    <td>{{ $atendimento->status }}</td>
                    <td>{{ $atendimento->created_at }}</td>
                    <td>{{ $atendimento->num_usp_atribuido }}</td>
                    <td>
                        <a href="{{ route('atendimento.edit', $atendimento->id) }}" class="btn btn-primary btn-sm">Editar</a>
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