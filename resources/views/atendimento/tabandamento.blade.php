<ul class="list-group">

@foreach ($logs as $log)

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $log->created_at->format('d/m/Y H:i') }}</strong> por {{ $log->createdby }} <br>
                    {{ $log->message }}<br>
                </div>
                <div>
                    <button class="btn btn-success" data-toggle="modal" data-target="#aprovarModal">Editar</button>
                </div>
            </li>
            
    @endforeach       
        </ul>
        