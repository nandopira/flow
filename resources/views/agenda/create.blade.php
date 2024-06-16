
<!-- resources/views/agendamento/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento de Tarefa</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .ui-datepicker-unavailable {
            background-color: lightgray;
            color: #aaa;
        }
        .ui-datepicker-partial {
            background-color: yellow;
        }
    </style>
</head>
<body>
    <form action="/agendamento" method="POST">
        @csrf
        <label for="datetime">Data e Hora:</label>
        <input type="text" id="datetimeAgenda" name="datetimeAgenda">
        <button type="submit">Agendar</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            var disponibilidades = @json($disponibilidades);

            $("#datetimeAgenda").datepicker({
                beforeShowDay: function(date) {
                    var dateString = $.datepicker.formatDate('yy-mm-dd', date);
                    if (disponibilidades[dateString] === 'indisponível') {
                        return [false, 'ui-datepicker-unavailable', 'Indisponível'];
                    } else if (disponibilidades[dateString] === 'parcial') {
                        return [true, 'ui-datepicker-partial', 'Parcialmente disponível'];
                    } else {
                        return [true, '', 'Disponível'];
                    }
                }
            });
        });
    </script>
</body>
</html>
