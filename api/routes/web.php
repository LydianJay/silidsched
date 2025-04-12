<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Dashboard;


Route::get('/', [Login::class,  'index'])->name('home');
Route::get('register', [Login::class,   'register'])->name(    'register');
Route::post('create', [Login::class,   'create'])->name(    'create');

Route::get('dashboard', [Dashboard::class,   'index'])->name(    'dashboard');