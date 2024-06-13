@extends('layouts.classic.masterpage')

@section('content')

<div class="ui-jqgrid-view" role="grid" style="width: 900px;">
    <div class="ui-widget-header ui-corner-top ui-jqgrid-titlebar ui-jqgrid-caption">
        <span class="ui-jqgrid-title">&nbsp&nbsp Formulário de Atendimento</span>
    </div>
    <div class="ui-state-default ui-corner-top ui-jqgrid-hdiv" style="width: 900px;">
        <div class="container mt-2">
        <div class="form-row">    
            <div class="form-group col">
                    Titulo: <span style="color: black;"> {{$atendimento->titulo }} </span>
                </div>
                <div class="form-group col">
                    Criado a: <span style="color: black;"> {{$atendimento->momcad }} 09 dias atras</span>
                </div>
        </div>
        <div class="form-row">    
                <div class="form-group col">
                Descrição: <span style="color: black;"> {{$atendimento->Descricao }} </span>
                </div>
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
                    <div class="form-group col role-group" id="atendente-group">
                        <label for="atendente">Status</label>
                        <input type="text" class="form-control autocomplete-input" id="atendente-autocomplete" placeholder="Digite para buscar...">
                    </div>
            </div>   
            
            <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="tabela1-tab" data-toggle="tab" href="#tabela1" role="tab" aria-controls="tabela1" aria-selected="true">Andamento</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tabela2-tab" data-toggle="tab" href="#tabela2" role="tab" aria-controls="tabela2" aria-selected="false">Agenda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tabela3-tab" data-toggle="tab" href="#tabela3" role="tab" aria-controls="tabela3" aria-selected="false">Envolvidos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tabela6-tab" data-toggle="tab" href="#tabela6" role="tab" aria-controls="tabela6" aria-selected="false">Arquivos</a>
            </li>    
        </ul>
        <div class="tab-content mt-2" id="myTabContent">
            <div class="tab-pane fade show active" id="tabela1" role="tabpanel" aria-labelledby="tabela1-tab">
        @include('atendimento.tabandamento')
        </div>
            <div class="tab-pane fade" id="tabela2" role="tabpanel" aria-labelledby="tabela2-tab">
               @include('atendimento.tabagenda')
            </div>
            <div class="tab-pane fade" id="tabela3" role="tabpanel" aria-labelledby="tabela3-tab">@include('atendimento.tabenvolvido')</div>
            <div class="tab-pane fade" id="tabela4" role="tabpanel" aria-labelledby="tabela4-tab">@include('atendimento.tabarquivos')</div>

        </div>
    </div>
</div>

    </div>
</div>
</div>

@endsection
