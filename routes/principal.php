<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Ruta simple y directa como en web.php
Route::get('/principal', function () {
    return Inertia::render('principal');
})->name('principal.page');


