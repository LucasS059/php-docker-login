<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // Importa nosso futuro Controller

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rota para a página inicial, que mostrará o formulário de login/cadastro
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

// Rota para processar o envio do formulário de cadastro
Route::post('/cadastrar', [AuthController::class, 'cadastrar'])->name('cadastrar.submit');

// Rota para processar o envio do formulário de login
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Rota para a página de boas-vindas (o dashboard)
// O 'middleware('auth')' é o segurança que protege esta página.
// Só usuários logados podem acessá-la.
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');

// Rota para fazer o logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');