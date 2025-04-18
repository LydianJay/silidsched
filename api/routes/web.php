<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Dashboard;

use App\Http\Controllers\Reservations;



Route::get('/', [Login::class,'index'])->name('home');
Route::get('/register', [Login::class,'register'])->name(    'register');
Route::post('/create', [Login::class,'create'])->name(    'create');
Route::post('/login', [Login::class,'login'])->name('login');



Route::middleware(['auth'])->group(function (){
    Route::get('/dashboard', [Dashboard::class,   'index'])->name(    'dashboard');
    Route::get('/view_reservation', [Reservations::class,   'index'])->name(    'reservation');
});