<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autocomplete and Role Items</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <style>
        .container {
            display: flex;
            gap: 10px;
        }
        .role-group {
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            flex: 1;
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
</head>
<body>
    <div class="container mt-3">
        <div class="role-group" id="observador-group">
            <label for="observador">Observador</label>
            <input type="text" class="autocomplete-input" id="observador-autocomplete" placeholder="Digite para buscar...">
            <div class="role-item">
                <span class="remove">✖</span>
                <span class="name">SCINFOR-66 Fernando</span>
                <span class="bell-icon">🔔</span>
                <span class="badge badge-secondary">25</span>
            </div>
        </div>
        <div class="role-group">
                <label for="requerente">Requerente</label>
                <div class="role-item">
                    <span class="remove">✖</span>
                    <span class="name">SCINFOR-66 Fernando</span>
                    <span class="bell-icon">🔔</span>
                    <span class="badge badge-secondary">25</span>
                </div>
                <div class="role-item">
                    <span class="remove">✖</span>
                    <span class="name">Rubens</span>
                    <span class="bell-icon">🔔</span>
                    <span class="badge badge-secondary">0</span>
                </div>
                <div class="role-item">
                    <span class="remove">✖</span>
                    <span class="name">Silmara Aparecida Cardoso Bortoletto</span>
                    <span class="bell-icon">🔔</span>
                    <span class="badge badge-secondary">0</span>
                </div>
        </div>
        <div class="role-group">
                <label for="atendentes">Atendentes</label>
                <div class="role-item">
                    <span class="remove">✖</span>
                    <span class="name">SCINFOR-66 Fernando</span>
                    <span class="bell-icon">🔔</span>
                    <span class="badge badge-secondary">25</span>
                </div>
                <div class="role-item">
                    <span class="remove">✖</span>
                    <span class="name">Rubens</span>
                    <span class="bell-icon">🔔</span>
                    <span class="badge badge-secondary">0</span>
                </div>
                <div class="role-item">
                    <span class="remove">✖</span>
                    <span class="name">Silmara Aparecida Cardoso Bortoletto</span>
                    <span class="bell-icon">🔔</span>
                    <span class="badge badge-secondary">0</span>
                </div>
        </div>        
    </div>

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
</body>
</html>
