<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Bem-vindo</title>
    <style>
        body { font-family: sans-serif; display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh; background-color: #eef; margin: 0; }
        h1 { color: #333; } form { margin-top: 1rem; }
        button { background: #6c757d; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; }
        button:hover { background: #5a6268; }
    </style>
</head>
<body>
    <h1>Olá, {{ Auth::user()->name }}!</h1>
    <p>Você está logado com sucesso.</p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Sair</button>
    </form>
</body>
</html>