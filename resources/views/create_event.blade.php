<!-- resources/views/create_event.blade.php -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Evento no Google Calendar</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Adicionar Evento no Google Calendar</h2>
    
    <!-- Botão para login no Google -->
    <a href="{{ url('auth/google') }}" class="btn btn-primary mb-3">Login com Google</a>
    
    @guest
               
               <button id="login-button" class="google-button">
               <a href="{{ url('auth/google') }}">  <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg" alt="Google Logo">
                       Entrar com Google
               </a>
                   </button>
               @else
                   <div id="user-info">
                       <p>Bem-vindo, {{ Auth::user()->name }}!</p>
                       <form action="{{ route('logout') }}" method="POST">
                           @csrf
                           <button type="submit" class="logout-button">Sair</button>
                       </form>
                   </div>
               @endguest
<br><br><br>



@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

@if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif



    <!-- Formulário para adicionar atividade -->
    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="activity">Atividade</label>
            <input type="text" class="form-control" id="activity" name="activity" placeholder="Digite a atividade" required>
        </div>
        <div class="form-group">
            <label for="date">Data</label>
            <input type="datetime-local" class="form-control" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="guest_email">Email do Convidado</label>
            <input type="email" class="form-control" id="guest_email" name="guest_email" placeholder="Digite o email do convidado" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
