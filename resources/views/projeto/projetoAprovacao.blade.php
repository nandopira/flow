@extends('layouts.classic.masterpage')

@section('content')

<title>Aprovação de Projeto/Etapa</title>
    <style>
        .table-custom thead {
            background-color: #f0ad4e;
            color: white;
        }
        .table-custom tbody tr:hover {
            background-color: #f5f5f5;
        }
    </style>

<body>
<div class="container mt-5">
    <h2 class="mb-4">Aprovação de Etapas do Projeto</h2>
    <table class="table table-bordered table-custom">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição da Etapa</th>
                <th>Data de Início</th>
                <th>Data de Término</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Etapa de Planejamento</td>
                <td>01/01/2024</td>
                <td>31/01/2024</td>
                <td>Pendente</td>
                <td>
                    <button class="btn btn-success" data-toggle="modal" data-target="#aprovarModal1">Aprovar</button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Execução Inicial</td>
                <td>01/02/2024</td>
                <td>28/02/2024</td>
                <td>Pendente</td>
                <td>
                    <button class="btn btn-success" data-toggle="modal" data-target="#aprovarModal2">Aprovar</button>
                </td>
            </tr>
            <!-- Adicione mais linhas conforme necessário -->
        </tbody>
    </table>
</div>

<!-- Modal de Aprovação 1 -->
<div class="modal fade" id="aprovarModal1" tabindex="-1" aria-labelledby="aprovarModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="aprovarModalLabel1">Aprovar Etapa 1</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="aprovarForm1" method="POST" action="#">
                    <!-- CSRF Token -->
                    <input type="hidden" name="_token" value="YOUR_CSRF_TOKEN">
                    <div class="form-group">
                        <label for="justificativa1">Justificativa / Despacho</label>
                        <textarea class="form-control" id="justificativa1" name="justificativa" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Aprovação 2 -->
<div class="modal fade" id="aprovarModal2" tabindex="-1" aria-labelledby="aprovarModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="aprovarModalLabel2">Aprovar Etapa 2</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="aprovarForm2" method="POST" action="#">
                    <!-- CSRF Token -->
                    <input type="hidden" name="_token" value="YOUR_CSRF_TOKEN">
                    <div class="form-group">
                        <label for="justificativa2">Justificativa / Despacho</label>
                        <textarea class="form-control" id="justificativa2" name="justificativa" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection