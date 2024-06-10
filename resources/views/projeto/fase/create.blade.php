@extends('layouts.classic.masterpage')

@section('content')
    <div class="ui-jqgrid-view" role="grid" style="width: 900px;">
        <div class="ui-widget-header ui-corner-top ui-jqgrid-titlebar ui-jqgrid-caption">
            <span class="ui-jqgrid-title">&nbsp&nbsp Formulário para Cadastro de Fase</span>
        </div>
        <div class="ui-state-default ui-corner-top ui-jqgrid-hdiv" style="width: 900px;">
            <div class="container mt-2">

        <form id="faseForm" method="POST" action="{{ route('fase.store') }}">
                    @csrf
        <div class="form-group">
            <label for="codigo">Código:</label>
            <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Digite o código da Fase" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Digite a descrição da Fase" required></textarea>
        </div>
        <div class="form-group">
            <label for="cor">Cor:</label>
            <input type="text" class="form-control" id="cor" name="cor" placeholder="Escolha a Cor" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
    @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div id="successMessage" class="alert alert-success mt-3">{{ session('success') }}</div>
                @endif
    </div>
</div>

<style>
        .table-custom thead {
            background-color: #f0ad4e;
            color: white;
        }
        .table-custom tbody tr:hover {
            background-color: #f5f5f5;
        }
        .form-header {
            background-color: #f0ad4e;
            color: white;
            padding: 10px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .form-container {
            border: 1px solid #f0ad4e;
            border-radius: 5px;
            padding: 20px;
        }
    </style>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>



@endsection
