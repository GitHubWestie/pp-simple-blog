<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login-register');
});

Route::post('/register', [UsersController::class, 'create']);

Route::post('/login', [UsersController::class, 'index']);
