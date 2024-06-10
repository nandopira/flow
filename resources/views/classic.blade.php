@extends('layouts.classic.masterpage')

@section('content')
<br>
    <div class="ui-jqgrid-view" role="grid" aria-multiselectable="false" id="gview_gridAvisoweb" style="width: 900px;">
        <div class="ui-widget-header ui-corner-top ui-jqgrid-titlebar ui-jqgrid-caption">
            <span class="ui-jqgrid-title">Formulário para Cadastro de obra</span>
        </div>
        <div class="ui-state-default ui-corner-top ui-jqgrid-hdiv" style="width: 900px;">
            <div class="container mt-4">
    <!--h2 class="mb-4">Cadastro de Obra</h2-->
    <form>
        <div class="form-group">
            <label for="projectName">Nome da Obra</label>
            <input type="text" class="form-control" id="projectName" placeholder="Digite o nome da obra" required>
        </div>
        <div class="form-group">
            <label for="projectDescription">Descrição</label>
            <textarea class="form-control" id="projectDescription" rows="3" placeholder="Digite a descrição da obra" required></textarea>
        </div>
        <div class="form-group">
            <label for="startDate">Data de Início</label>
            <input type="date" class="form-control" id="startDate" required>
        </div>
        <div class="form-group">
            <label for="endDate">Data de Término</label>
            <input type="date" class="form-control" id="endDate" required>
        </div>
        <div class="form-group">
            <label for="budget">Orçamento</label>
            <input type="number" class="form-control" id="budget" placeholder="Digite o orçamento da obra" required>
        </div>
        <div class="form-group">
            <label for="projectManager">Responsável pela Obra</label>
            <input type="text" class="form-control" id="projectManager" placeholder="Digite o nome do responsável" required>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar Obra</button>
    </form>
</div>
        </div>
    </div>
</div>

<style>
        .table-custom thead {
            background-color: #f0ad4e;
            color: white;
        }
        .table-custom tbody tr:hover {
            background-color: #f5f5f5;
        }
        .form-header {
            background-color: #f0ad4e;
            color: white;
            padding: 10px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .form-container {
            border: 1px solid #f0ad4e;
            border-radius: 5px;
            padding: 20px;
        }
    </style>

<div class="container mt-5">
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
</div>

</body>
</html>



@endsection
