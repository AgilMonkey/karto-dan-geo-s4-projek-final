<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\DatangController;
use App\Models\Absen;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        // Only authenticated users can access this route
        return view('home');
    });
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/login', [LoginController::class, 'create']);
Route::post('/login', [LoginController::class, 'store']);
Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [AbsenController::class, 'index']);

Route::post('/datang', [DatangController::class, 'store']);
Route::post('/pulang', [DatangController::class, 'store']);