<?php

use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ChirpController::class, 'index']);

Route::resource('chirps', ChirpController::class)
  ->middleware(('auth'))
  ->only(['store', 'edit', 'update', 'destroy']);

Route::view('/register', 'auth.register')
  ->middleware('guest')
  ->name('register');

Route::post('/register', Register::class)
  ->middleware('guest');
