<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\RawDataController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/cek-mongo', function () {
    // Ambil semua data user dari Mongo
    $users = User::all();
    
    // Tampilkan sebagai JSON di layar
    return $users;
});

Route::resource('/score', ScoreController::class);
Route::resource('/RawData', RawDataController::class);