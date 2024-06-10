<!DOCTYPE html>
<html>
<head>
    <title>Token Response</title>
</head>
<body>
    @if(isset($data))
        <h1>Token Obtido com Sucesso</h1>
        <pre>{{ json_encode($data, JSON_PRETTY_PRINT) }}</pre>
    @elseif(isset($error))
        <h1>Erro ao Obter Token</h1>
        <p>{{ $error }}</p>
    @else
        <h1>Nenhuma Resposta</h1>
    @endif
</body>
</html>
