<?php

use App\Http\Controllers\PendudukControler;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Perhatikan ejaan nama controller Anda (Controler - satu 'l')

Route::get('/penduduk', [PendudukControler::class, 'index'])->name('penduduk.index')->middleware('auth');
Route::get('/penduduk/create', [PendudukControler::class, 'create'])->name('penduduk.create')->middleware('auth');
Route::post('/penduduk/store', [PendudukControler::class, 'store'])->middleware('auth');
Route::get('/penduduk/show/{id}', [PendudukControler::class, 'show'])->name('penduduk.show')->middleware('auth');
Route::get('/penduduk/edit/{id}', [PendudukControler::class, 'edit'])->name('penduduk.edit')->middleware('auth');
Route::put('/penduduk/update/{id}', [PendudukControler::class, 'update'])->name('penduduk.update')->middleware('auth');
Route::delete('/penduduk/destroy/{id}', [PendudukControler::class, 'destroy'])->name('penduduk.destroy')->middleware('auth');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
