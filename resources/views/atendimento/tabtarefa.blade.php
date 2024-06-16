<ul class="list-group">

@foreach ($tarefas as $tarefa)

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $tarefa->dtprevini->format('d/m/Y H:i') }}</strong><br>
                    {{ $tarefa->titulo }} {{ $tarefa->descricao }}<br>
                </div>
                <div>
                    <button class="btn btn-success" data-toggle="modal" data-target="#aprovarModal">Editar</button>
                </div>
            </li>
            
    @endforeach       
        </ul>