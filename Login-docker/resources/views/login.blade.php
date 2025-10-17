<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style> /* Estilos para deixar a página bonita */
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f0f2f5; margin: 0; }
        .container { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); display: flex; gap: 4rem; }
        .form-box { width: 250px; } h2 { text-align: center; color: #333; }
        input { width: 100%; padding: 0.5rem; margin-bottom: 1rem; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;}
        button { width: 100%; padding: 0.7rem; border: none; border-radius: 4px; background-color: #007bff; color: white; font-size: 1rem; cursor: pointer; }
        button:hover { background-color: #0056b3; } .error { color: red; font-size: 0.9rem; text-align: center; margin-bottom: 1rem; }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-box">
            <h2>Cadastrar</h2>
            <form action="{{ route('cadastrar.submit') }}" method="POST">
                @csrf <input type="text" name="name" placeholder="Nome de usuário" required>
                <input type="password" name="password" placeholder="Senha" required>
                <button type="submit">Cadastrar</button>
            </form>
        </div>
        <div class="form-box">
            <h2>Login</h2>
            <form action="{{ route('login.submit') }}" method="POST">
                @csrf
                @error('name') <div class="error">{{ $message }}</div> @enderror
                <input type="text" name="name" placeholder="Nome de usuário" required>
                <input type="password" name="password" placeholder="Senha" required>
                <button type="submit">Entrar</button>
            </form>
        </div>
    </div>
</body>
</html>