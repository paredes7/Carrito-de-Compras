<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

// Rutas de registro personalizadas
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');

Route::post('register', [RegisteredUserController::class, 'store']);


//grupo protegido con midleware "auth"
Route::middleware(['auth'])->group(function () {

    // ==== RUTAS PROTEGIDAS (requieren sesión iniciada) ====
    //pagina orincipal de usuarios
    Route::get('/user', [UsersController::class, 'store'])->name('user.store');
});
