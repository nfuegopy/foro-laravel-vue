<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Ruta principal redirigida al login
Route::get('/', function () {
    return redirect('/login');
});

// Ruta para el login
Route::get('/login', function () {
    return view('login');
});

// Ruta para el foro
Route::get('/forum', function () {
    return view('layout.forum');
});

Route::prefix('usuarios')->group(function () {
    Route::post('/cliente', [UserController::class, 'guardarCliente'])->name('usuarios.cliente.guardar');
    Route::post('/admin', [UserController::class, 'guardarAdmin'])->name('usuarios.admin.guardar');
    Route::post('/', [UserController::class, 'guardar'])->name('usuarios.guardar');
    Route::get('/', [UserController::class, 'listar'])->name('usuarios.listar');
    Route::get('/crear', [UserController::class, 'crear'])->name('usuarios.crear');
    Route::get('/{id}', [UserController::class, 'obtener'])->name('usuarios.obtener');
    Route::get('/{id}/editar', [UserController::class, 'editar'])->name('usuarios.editar');
    Route::patch('/{id}', [UserController::class, 'actualizar'])->name('usuarios.actualizar');
    Route::delete('/{id}', [UserController::class, 'eliminar'])->name('usuarios.eliminar');
});