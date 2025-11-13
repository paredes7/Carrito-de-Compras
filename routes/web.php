<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Home');
})->name('Home-principal');


// Rutas de autenticación base de Breeze
require __DIR__.'/auth.php';

// Rutas personalizadas de registro
require __DIR__.'/app.php';

require __DIR__.'/loginSocial.php';