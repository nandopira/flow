@extends('layouts.classic.masterpage')

@section('content')

<style>
    .role-group {
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 5px;
    }
    .role-group label {
        font-weight: bold;
    }
    .role-item {
        display: flex;
        align-items: center;
        border: 1px solid #ddd;
        padding: 5px;
        border-radius: 5px;
        margin-bottom: 5px;
    }
    .role-item .remove {
        margin-right: 10px;
        cursor: pointer;
    }
    .role-item .badge {
        margin-left: auto;
        margin-right: 10px;
    }
    .role-item .bell-icon {
        margin-right: 10px;
    }
    .autocomplete-input {
        width: 100%;
        padding: 5px;
    }
</style>

<div class="ui-jqgrid-view" role="grid" style="width: 900px;">
    <div class="ui-widget-header ui-corner-top ui-jqgrid-titlebar ui-jqgrid-caption">
        <span class="ui-jqgrid-title">&nbsp&nbsp Formulário de Atendimento</span>
    </div>
    <div class="ui-state-default ui-corner-top ui-jqgrid-hdiv" style="width: 900px;">
        <div class="container mt-2">

            <form action="{{ route('atendimento.update', $atendimento->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="autor" name="autor" value="{{ $atendimento->titulo }}">
                <div class="form-group">
                    <label for="titulo">Titulo:</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $atendimento->titulo }}" readonly>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3" readonly>{{ $atendimento->descricao }}</textarea>
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
                    <div class="form-group col role-group" id="observador-group">
                        <label for="observador">Observador</label>
                        <input type="text" class="form-control autocomplete-input" id="observador-autocomplete" placeholder="Digite para buscar...">
                    </div>
                </div>

                <div class="form-group">
                    <label for="despacho">Despacho</label>
                    <textarea class="form-control" id="despacho" name="despacho" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>

<!-- jQuery and jQuery UI inclusion -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script>
    $(document).ready(function() {
        var availableTags = [
            "Adriana Paula Angelocci",
            "Adriano - Transportes - Tadeu Ferreira de Albuquerque",
            "Alessandra Aparecida de Oliveira",
            "Aloisio Bispo dos Santos",
            "Álvaro Sobreiro Filho",
            "Alves Jose Antonio"
        ];

        $("#observador-autocomplete").autocomplete({
            source: availableTags,
            select: function(event, ui) {
                var selectedItem = ui.item.value;
                addRoleItem(selectedItem);
                $(this).val(''); // Clear the input
                return false;
            }
        });

        // Adiciona um novo item ao pressionar Enter
        $("#observador-autocomplete").keypress(function(event) {
            if (event.which == 13) { // Enter key pressed
                var newItem = $(this).val().trim();
                if (newItem !== "") {
                    addRoleItem(newItem);
                    $(this).val(''); // Clear the input
                }
                return false; // Prevent form submission
            }
        });

        function addRoleItem(name) {
            var roleItem = `
                <div class="role-item">
                    <span class="remove">✖</span>
                    <span class="name">${name}</span>
                    <span class="bell-icon">🔔</span>
                    <span class="badge badge-secondary">0</span>
                </div>`;
            $('#observador-group').append(roleItem);
            // Adiciona o novo item à lista de tags disponíveis
            if (!availableTags.includes(name)) {
                availableTags.push(name);
            }
        }

        $(document).on('click', '.role-item .remove', function() {
            $(this).parent().remove();
        });
    });
</script>

@endsection
