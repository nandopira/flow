<ul class="list-group">

@foreach ($logs as $log)

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ ucfirst(\Carbon\Carbon::parse($log->created_at)->locale('pt_BR')->translatedFormat('l d/m'))  }}
                    </strong> por {{ $log->createdby }} <br>
                    {{ $log->message }}<br>
                </div>
                <div>
                    <button class="btn btn-success" data-toggle="modal" data-target="#aprovarModal">Editar</button>
                </div>
            </li>
            
    @endforeach       
        </ul>
        