<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Processo</title>
</head>
<body>
    <h1>Consultar Andamento de Processo</h1>
    <form action="http://cloud.pusplq.usp.br:8200/gestao/public/consulta-processo" method="POST">
        @csrf
        <label for="numero">Número do Processo:</label>
        <input type="text" id="numero" name="numero" required>
        <button type="submit">Consultar</button>
    </form>
</body>
</html>
