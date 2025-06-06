<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Dashboard;

use App\Http\Controllers\Reservations;
use App\Http\Controllers\Building;
use App\Http\Controllers\Room;
use App\Models\Reservation;

use App\Http\Controllers\Admin;

Route::get('/', [Login::class,'index'])->name('home');
Route::get('/register', [Login::class,'register'])->name(    'register');
Route::post('/create', [Login::class,'create'])->name(    'create');
Route::post('/login', [Login::class,'login'])->name('login');


Route::get('/qr', [Reservations::class, 'generateQR'])->name('qr');
Route::get('/occupy', [Reservations::class, 'occupy'])->name('occupy');

Route::middleware(['auth'])->group(function (){
    Route::get('/dashboard', [Dashboard::class,   'index'])->name(    'dashboard');
    Route::get('/view_reservation', [Reservations::class,   'index'])->name(    'view_reservation');
    Route::get('/add_buildings', [Building::class, 'index'])->name('add_building');
    Route::post('/upload_buildings', [Building::class, 'upload'])->name('upload_building');
    Route::get('/add_room', [Room::class, 'index'])->name('add_room');
    Route::post('/create_room', [Room::class, 'create'])->name('create_room');
    Route::get('/quit', [Reservations::class, 'quit'])->name('quit');

    Route::get('/reservation', [Building::class, 'reservation'])->name('reservation');

    Route::post('/add_reservation', [Reservations::class, 'reserve'])->name('add_reservation');

    Route::get('/admin/users', [Admin::class, 'index'])->name('users');
    Route::get('/delete_user', [Admin::class, 'delete'])->name('delete_user');
    Route::post('/admin/edit', [Admin::class, 'edit'])->name('users_edit');
    Route::get('/logout', [Admin::class, 'logout'])->name('logout');


    Route::get('/delete_building', [Building::class, 'delete_view'])->name('delete_building');
    Route::post('/delete_building', [Building::class, 'delete'])->name('delete_building_post');


    Route::get('/delete_room', [Room::class, 'delete_room_view'])->name('delete_room');
    Route::post('/delete_room', [Room::class, 'delete'])->name('delete_room_post');
});