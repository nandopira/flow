@extends('layouts.classic.masterpage')

@section('content')

<div class="ui-jqgrid-view" role="grid" style="width: 900px;">
    <div class="ui-widget-header ui-corner-top ui-jqgrid-titlebar ui-jqgrid-caption">
        <span class="ui-jqgrid-title">&nbsp&nbsp Formulário de Atendimento</span>
    </div>
    <div class="ui-state-default ui-corner-top ui-jqgrid-hdiv" style="width: 900px;">
        <div class="container mt-2">
                <div class="form-group">
                    Titulo: <span style="color: black;"> {{$atendimento->titulo }} </span>
                </div>
                <div class="form-group">
                Descrição: <span style="color: black;"> {{$atendimento->Descricao }} </span>
            </div>
            <div class="form-row">
                    <div class="form-group col role-group" id="solicitante-group">
                        <label for="solicitante">Solicitante</label>
                        <input type="text" class="form-control autocomplete-input" id="solicitante-autocomplete" placeholder="Digite para buscar...">
                    </div>
                    <div class="form-group col role-group" id="atendente-group">
                        <label for="atendente">Atendente</label>
                        <input type="text" class="form-control autocomplete-input" id="atendente-autocomplete" placeholder="Digite para buscar...">
                    </div>
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


    </div>
</div>
</div>

@endsection
