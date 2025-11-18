<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\PersilController;
use App\Http\Controllers\DokumenController;


Route::get('/', function () {
    return view('layouts.guest.app');
})->name('dashboard');
Route::resource('warga', WargaController::class);
Route::resource('persil', PersilController::class);
Route::resource('user', UserController::class);
Route::resource('dokumen', DokumenController::class);

Route::get('/about', function () {
    return view('pages.about.index');
})->name('pages.about.index');
Route::get('/whatsapp', function () {
    return view('pages.whatsapp.whatsapp');
})->name('whatsapp.form');
