<?php

namespace App\Http\Controllers;

use App\Models\User; // O Model que representa nossa tabela de usuários
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // O sistema de autenticação do Laravel
use Illuminate\Support\Facades\Hash; // Ferramenta para criptografar senhas

class AuthController extends Controller
{
    // Mostra a view do formulário
    public function showLoginForm()
    {
        return view('login');
    }

    // Processa o cadastro de um novo usuário
    public function cadastrar(Request $request)
    {
        // Valida os dados que vieram do formulário
        $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:4',
        ]);

        // Cria o usuário no banco de dados
        User::create([
            'name' => $request->name,
            'email' => $request->name . '@example.com', // A tabela padrão exige email
            // IMPORTANTE: Criptografa a senha antes de salvar!
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login');
    }

    // Processa a tentativa de login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // Tenta autenticar o usuário com os dados fornecidos
        if (Auth::attempt(['name' => $credentials['name'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        // Se a autenticação falhar, volta para o login com uma mensagem de erro
        return back()->withErrors(['name' => 'Credenciais inválidas.'])->onlyInput('name');
    }

    // Mostra a página de boas-vindas
    public function dashboard()
    {
        return view('dashboard');
    }

    // Faz o logout do usuário
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}