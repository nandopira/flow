<!DOCTYPE html>
<html>
<head>
    <title>Laravel Google Login</title>
</head>
<body>
    @if (Auth::check())
        <p>Olá, {{ Auth::user()->name }}!</p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @else
        <a href="{{ route('google.login') }}">Login com Google</a>
    @endif
    <br>

    @if (isset($google_user) && !is_null($google_user->name))
    <p>Olá, {{ $google_user->name }}!</p>
@else
    <p>Usuário não autenticado.</p>
@endif

</body>
</html>
