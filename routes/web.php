<?php

use Illuminate\Support\Facades\Route;

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