<ul class="list-group">

@foreach ($agendas as $agenda)

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $agenda->data_agendada->format('d/m/Y H:i') }}</strong><br>
                    {{ $agenda->proprietario }}<br>
                </div>
                <div>
                    <button class="btn btn-success" data-toggle="modal" data-target="#aprovarModal">Editar</button>
                </div>
            </li>
            
    @endforeach       
        </ul>