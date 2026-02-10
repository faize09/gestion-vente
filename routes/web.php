<?php

use App\Http\Controllers\CustomLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [CustomLoginController::class, 'index'])->name('login');
Route::post('/login', [CustomLoginController::class, 'authenticate'])->name('authenticate');