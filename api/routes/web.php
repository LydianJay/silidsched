<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Dashboard;

use App\Http\Controllers\Reservations;
use App\Http\Controllers\Building;
use App\Http\Controllers\Room;


Route::get('/', [Login::class,'index'])->name('home');
Route::get('/register', [Login::class,'register'])->name(    'register');
Route::post('/create', [Login::class,'create'])->name(    'create');
Route::post('/login', [Login::class,'login'])->name('login');



Route::middleware(['auth'])->group(function (){
    Route::get('/dashboard', [Dashboard::class,   'index'])->name(    'dashboard');
    Route::get('/view_reservation', [Reservations::class,   'index'])->name(    'reservation');
    Route::get('/add_buildings', [Building::class, 'index'])->name('add_building');
    Route::post('/upload_buildings', [Building::class, 'upload'])->name('upload_building');
    Route::get('/add_room', [Room::class, 'index'])->name('add_room');
    Route::post('/create_room', [Room::class, 'create'])->name('create_room');
    

    Route::get('/reservation', [Building::class, 'reservation'])->name('reservation');
});