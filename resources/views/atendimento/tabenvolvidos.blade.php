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
                    {{ $envolvido->numeroUSP }} - 
                    {{ $envolvido->tipo }} <br>
                </div>
                <div>
                    <button class="btn btn-success" onclick="confirmRemoval(event)">Remover</button>
                </div>
            </li>
            
    @endforeach       
        </ul>

        <script>
        function confirmRemoval(event) {
            if (!confirm('Você tem certeza que deseja remover este item?')) {
                event.preventDefault();
            }
        }
    </script>