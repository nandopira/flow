<ul class="list-group">

@foreach ($tarefas as $tarefa)

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div><span style="font-size: small;">
                     <strong>{{ $tarefa->dtprevini->format('d/m H:i') }} </strong> {{ ucfirst(\Carbon\Carbon::parse($tarefa->dtprevini)->locale('pt_BR')->translatedFormat('l'))  }}<br>
                    </span>
                    &nbsp;&nbsp;&nbsp; {{ $tarefa->titulo }} {{ $tarefa->descricao }}<br>
                </div>
                <div>
                    <button class="btn btn-success" data-toggle="modal" data-target="#aprovarModal">Editar</button>
                </div>
            </li>
            
    @endforeach       
        </ul>