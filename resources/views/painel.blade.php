@extends('layouts.classic.masterpage')

@section('content')
<br>
    <div class="ui-jqgrid-view" role="grid" aria-multiselectable="false" id="gview_gridAvisoweb" style="width: 900px;">
        <div class="ui-widget-header ui-corner-top ui-jqgrid-titlebar ui-jqgrid-caption">
            <span class="ui-jqgrid-title">Lista de Obras</span>
        </div>
        <div class="ui-state-default ui-corner-top ui-jqgrid-hdiv" style="width: 900px;">
            <div class="container mt-4">
    <!--h2 class="mb-4">Cadastro de Obra</h2-->
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-header {
            background-color: #f0ad4e;
            color: white;
            padding: 10px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .form-container, .panel-container {
            border: 1px solid #f0ad4e;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .table-custom thead {
            background-color: #f0ad4e;
            color: white;
        }
        .table-custom tbody tr:hover {
            background-color: #f5f5f5;
        }
        .card-header {
            background-color: #f0ad4e;
            color: white;
        }
    </style>

<div class="container mt-3">
   
    <table class="table table-bordered table-custom mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome do Projeto</th>
                <th>Descrição</th>
                <th>Data de Início</th>
                <th>Data de Término</th>
                <th>Orçamento</th>
                <th>Responsável</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Projeto A</td>
                <td>Descrição do Projeto A</td>
                <td>01/01/2024</td>
                <td>31/12/2024</td>
                <td>R$ 100.000,00</td>
                <td>João Silva</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Projeto B</td>
                <td>Descrição do Projeto B</td>
                <td>15/02/2024</td>
                <td>15/11/2024</td>
                <td>R$ 200.000,00</td>
                <td>Maria Oliveira</td>
            </tr>
            <!-- Adicione mais linhas conforme necessário -->
        </tbody>
    </table>

    <h2 class="mt-3">Painel de Aprovações</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card panel-container">
                <div class="card-header">Etapa 01</div>
                <div class="card-body">
                    <p>Descrição da Etapa 01.</p>
                    <p>Status: Aprovado</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card panel-container">
                <div class="card-header">Etapa 02</div>
                <div class="card-body">
                    <p>Descrição da Etapa 02.</p>
                    <p>Status: Em Progresso</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card panel-container">
                <div class="card-header">Etapa 03</div>
                <div class="card-body">
                    <p>Descrição da Etapa 03.</p>
                    <p>Status: Pendente</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


            </div>
        </div>
    </div>        
</body>
</html>



@endsection
