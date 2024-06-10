@extends('layouts.classic.masterpage')

@section('content')

<style>
        .pendente {
            background-color: yellow;
            font-style: italic;
            padding: 2px 4px;
            border-radius: 4px;
        }

        .list-group-item:hover {
            background-color: #f0f0f0;
        }

    </style>

<div class="ui-jqgrid-view" role="grid" style="width: 900px;">
        <div class="ui-widget-header ui-corner-top ui-jqgrid-titlebar ui-jqgrid-caption">
            <span class="ui-jqgrid-title">&nbsp&nbsp Detalhes do Projeto</span>
        </div>
        <div class="ui-state-default ui-corner-top ui-jqgrid-hdiv" style="width: 900px;">
        <div class="container mt-2">
        <div class="row">
            <div class="col-md-8">
            <div>
    <p><strong>Projeto:</strong>{{ $projeto->nome }} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
    <a href="{{ route('engenharia.edit', $projeto->id) }}">Edit</a> </p> 
</div>
<div style="display: flex;">
    <div style="width: 34%;">
        <p><strong>Status:</strong> Em andamento</p>
        <p><strong>Situação:</strong> Licitação Concluída</p>
        <p><strong>Próximo:</strong> Fiscalização</p>
        <p><strong>Natureza:</strong> Fiscalização</p>
        <p><strong>Recurso Aprovado:</strong> Fiscalização</p>
    </div>
    <div style="width: 33%;"> 
        <p><strong>Data Inicial Prevista:</strong> Compras</p>
        <p><strong>Data Final Prevista:</strong> 01/01/2025</p>
        <p><strong>PCA:</strong> 10/02/2025</p>
        <p><strong>Origem Recursos:</strong> 10/02/2025</p>
        <p><strong>Recurso Total:</strong> Fiscalização</p>
    </div>
    <div style="width: 33%;"> 
        <p><strong>Data Inicial Ocorrida:</strong> Compras</p>
        <p><strong>Data Final Ocorrida:</strong> 01/01/2025</p>
        <p><strong>Ordem PCA:</strong> 10/02/2025</p>
        <p><strong>Projeto:</strong> propio ou terceirizado </p>
        <p><strong>Orçamento CODAGE:</strong> Fiscalização</p>
    </div>    
</div>
            </div>
            <!-- div class="col-md-4">
                <h4>Fases</h4>
                <ul class="list-group">
                    <li class="list-group-item">Fase 01: 10%</li>
                    <li class="list-group-item">Fase 02: 20%</li>
                    <li class="list-group-item">Fase 03: 30%</li>
                    <li class="list-group-item">Fase 04: 40%</li>
                </ul>
            </div -->
        </div>
        <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="tabela1-tab" data-toggle="tab" href="#tabela1" role="tab" aria-controls="tabela1" aria-selected="true">Aprovações</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tabela2-tab" data-toggle="tab" href="#tabela2" role="tab" aria-controls="tabela2" aria-selected="false">Agenda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tabela3-tab" data-toggle="tab" href="#tabela3" role="tab" aria-controls="tabela3" aria-selected="false">Envolvidos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tabela4-tab" data-toggle="tab" href="#tabela4" role="tab" aria-controls="tabela4" aria-selected="false">Comentários</a>
            </li>        
            <li class="nav-item">
                <a class="nav-link" id="tabela5-tab" data-toggle="tab" href="#tabela5" role="tab" aria-controls="tabela5" aria-selected="false">Sei!</a>
            </li>         
            <li class="nav-item">
                <a class="nav-link" id="tabela6-tab" data-toggle="tab" href="#tabela6" role="tab" aria-controls="tabela6" aria-selected="false">Arquivos</a>
            </li>    
            <li class="nav-item">
                <a class="nav-link" id="tabela7-tab" data-toggle="tab" href="#tabela7" role="tab" aria-controls="tabela7" aria-selected="false">Fotos</a>
            </li>                                  
            <li class="nav-item">
                <a class="nav-link" id="tabela8-tab" data-toggle="tab" href="#tabela8" role="tab" aria-controls="tabela8" aria-selected="false">Atividade</a>
            </li>                                  
        </ul>
        <div class="tab-content mt-2" id="myTabContent">
            <div class="tab-pane fade show active" id="tabela1" role="tabpanel" aria-labelledby="tabela1-tab">
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>Etapa de Planejamento</strong><br>
                    Data: 01/01/2024<br>
                    Aprovação: <span class="pendente">Pendente</span>   </div>
                <div>
                    <button class="btn btn-success" data-toggle="modal" data-target="#aprovarModal">Aprovar</button>
                    <button class="btn btn-danger">Rejeitar</button>
                </div>
            </li>
            <li class="list-group-item">
                <strong>Execução Inicial</strong><br>
                Data: 01/02/2024<br>
                Aprovado por: Maria Oliveira
            </li>
            <li class="list-group-item">
                <strong>Revisão de Meio Término</strong><br>
                Data: 01/03/2024<br>
                Aprovado por: Carlos Souza
            </li>
            <li class="list-group-item">
                <strong>Consolidação Final</strong><br>
                Data: 01/04/2024<br>
                Aprovado por: Ana Costa
            </li>
            <li class="list-group-item">
                <strong>Encerramento</strong><br>
                Data: 01/05/2024<br>
                Aprovado por: Pedro Martins
            </li>
        </ul>
            </div>
            <div class="tab-pane fade" id="tabela2" role="tabpanel" aria-labelledby="tabela2-tab">
                <ul>
                    <li>05/06/2024 - Reunião inicial de planejamento com a equipe.</li>
                    <li>12/06/2024 - Definição do escopo e cronograma detalhado do projeto.</li>
                    <li>20/06/2024 - Início da fase de pesquisa e coleta de dados.</li>
                    <li>01/07/2024 - Apresentação do relatório inicial com os resultados da pesquisa.</li>
                    <li>15/07/2024 - Reunião de acompanhamento para avaliação do progresso e ajustes no cronograma.</li>
                    <li>01/08/2024 - Início da fase de desenvolvimento e implementação das soluções propostas.</li>
                    <li>15/08/2024 - Testes e validação das soluções implementadas.</li>
                    <li>01/09/2024 - Apresentação do relatório final com os resultados do projeto.</li>
                    <li>15/09/2024 - Reunião de encerramento com a equipe para avaliação do projeto e lições aprendidas.</li>
                    <li>30/09/2024 - Entrega final do projeto e documentação completa.</li>
                </ul>
            </div>
            <div class="tab-pane fade" id="tabela3" role="tabpanel" aria-labelledby="tabela3-tab">Conteúdo da Tabela 3</div>
            <div class="tab-pane fade" id="tabela4" role="tabpanel" aria-labelledby="tabela4-tab">Conteúdo da Tabela 4</div>
            <div class="tab-pane fade" id="tabela5" role="tabpanel" aria-labelledby="tabela5-tab">Conteúdo da Tabela 5</div>   
            <div class="tab-pane fade" id="tabela6" role="tabpanel" aria-labelledby="tabela6-tab">@include('projeto.detalhe.arquivo')</div>    
            <div class="tab-pane fade" id="tabela7" role="tabpanel" aria-labelledby="tabela7-tab">Conteúdo da Tabela 5</div>          
            <div class="tab-pane fade" id="tabela8" role="tabpanel" aria-labelledby="tabela8-tab">@include('projeto.detalhe.atividade')</div>          
        </div>
    </div>
</div>


    <!-- Modal de Aprovação -->
    <div class="modal fade" id="aprovarModal" tabindex="-1" aria-labelledby="aprovarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="aprovarModalLabel">Justificativa para Aprovação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="justificativaForm">
                        <div class="form-group">
                            <label for="justificativa">Justificativa</label>
                            <textarea class="form-control" id="justificativa" name="justificativa" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<br><br><br><br>
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


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>



@endsection
