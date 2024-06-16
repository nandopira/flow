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
                @if($atendimento->status == 'novo')
                    <a href="{{ route('atendimento.atender', $atendimento->id) }}" class="btn btn-success"><span style="color: white;">Atender</span></a>
                    <button class="btn btn-danger" data-target="#aprovarModal" data-toggle="modal">Rejeitar</a>

                @else
                    <button class="btn btn-success" data-toggle="modal" data-target="#aprovarModal">Transferir</button>
                    <button class="btn btn-success" data-toggle="modal" data-target="#agendaModal">Agendar</button>
                    <button class="btn btn-success" data-toggle="modal" data-target="#NovaTarefaModal">Nova Tarefa</button>
                @endif
                </div>
        </div>
        <div class="form-row">    
                <div class="form-group col">
                Descrição: <span style="color: black;"> {{$atendimento->descricao }} </span>
                </div>
                <div class="form-group col">
                @php
                    $createdDate = \Carbon\Carbon::parse($atendimento->created_at);
                    $currentDate = \Carbon\Carbon::now();
                    $daysDifference = $createdDate->diffInDays($currentDate);
                @endphp
                    Criado a: <span style="color: black;">{{ $daysDifference == 0 ? 'hoje' : $daysDifference . ' dias atrás' }}</span>
                </div>
        </div>
            <div class="form-row">
                    <div class="form-group col" id="solicitante-group">
                    Solicitante: <span style="color: black;"> {{$atendimento->solicitante }} </span>
                    </div>
                    <div class="form-group col" id="atendente-group">
                    Atendente: <span style="color: black;"> {{$atendimento->atendente }} </span>
                    </div>
                    <div class="form-group col" id="atendente-group">
                    Status: <span style="color: black;"> {{$atendimento->status }} </span>
                    </div>
            </div>
            <div class="form-row">
            <div class="form-group col" id="atendente-group">        
                 <label for="interacao">Interação</label>                    
                    <form action="{{ route('log.storeTask', ['id' => $atendimento->id]) }}" method="POST" style="display:inline;">
                     @csrf
                     <label for="interacao">Interação</label>
                    <textarea class="form-control" cols="3" id="interacao" name="interacao" placeholder="Digite sua interação..."></textarea>                    
                    <input type="hidden" name="table_name" id="table_name" value="TAREFA">
                    <div class="text-right mt-2"> 
                         <button type="submit" class="btn btn-success">Salvar</button>
                         <button type="submit" class="btn btn-success">Finalizar</button>
                    </div>
                    </form>
            </div>   
            </div>
            
            <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="tabela1-tab" data-toggle="tab" href="#tabela1" role="tab" aria-controls="tabela1" aria-selected="true">Andamento</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tabela2-tab" data-toggle="tab" href="#tabela2" role="tab" aria-controls="tabela2" aria-selected="false">Tarefas</a>
            </li>            
            <li class="nav-item">
                <a class="nav-link" id="tabela3-tab" data-toggle="tab" href="#tabela3" role="tab" aria-controls="tabela3" aria-selected="false">Agenda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tabela4-tab" data-toggle="tab" href="#tabela4" role="tab" aria-controls="tabela4" aria-selected="false">Envolvidos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tabela5-tab" data-toggle="tab" href="#tabela5" role="tab" aria-controls="tabela5" aria-selected="false">Arquivos</a>
            </li>    
        </ul>
        <div class="tab-content mt-2" id="myTabContent">
            <div class="tab-pane fade show active" id="tabela1" role="tabpanel" aria-labelledby="tabela1-tab">
            @include('atendimento.tabandamento')
        </div>
            <div class="tab-pane fade" id="tabela2" role="tabpanel" aria-labelledby="tabela2-tab">
               @include('atendimento.tabtarefa')
            </div>
            <div class="tab-pane fade" id="tabela3" role="tabpanel" aria-labelledby="tabela3-tab">@include('atendimento.tabagenda')</div>
            <div class="tab-pane fade" id="tabela4" role="tabpanel" aria-labelledby="tabela4-tab">@include('atendimento.tabenvolvidos')</div>
            <div class="tab-pane fade" id="tabela5" role="tabpanel" aria-labelledby="tabela5-tab">@include('atendimento.tabarquivos')</div>
        </div>
        <br>
    </div>
</div>

    </div>
</div>
</div>


@include('atendimento.modal')

    </div>
</div>
</div>

@endsection
