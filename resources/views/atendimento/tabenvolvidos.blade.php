<ul class="list-group">

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong></strong><br>
                    <br>
                </div>
                <div>
                    <button class="btn btn-success" data-toggle="modal" data-target="#envolvidoModal">Adicionar</button>
                </div>
            </li>


@foreach ($envolvidos as $envolvido)

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $envolvido->nome }}</strong><br>
                    {{ $envolvido->tipo }} <br>
                </div>
                <div>
                    <button class="btn btn-success" data-toggle="modal" data-target="#aprovarModal">Editar</button>
                </div>
            </li>
            
    @endforeach       
        </ul>