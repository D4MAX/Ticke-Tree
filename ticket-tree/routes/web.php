<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// ================================
// CRUD EVENT / TIKET
// ================================

Route::get('/tiket-buat', [EventController::class, 'index'])->name('tiket-buat');
Route::post('/simpan-tiket', [EventController::class, 'store'])->name('event.store');

