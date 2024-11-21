<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/google/redirect', [App\Http\Controllers\GoogleAuthController::class, 'redirect'])->name('auth.google.redirect');

Route::get('/auth/google/callback', [App\Http\Controllers\GoogleAuthController::class, 'callback'])->name('auth.google.callback');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');
