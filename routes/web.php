<?php
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\PersilController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\PetaPersilController;
use App\Http\Controllers\SengketaPersilController;
use App\Http\Controllers\JenisPenggunaanController;

Route::get('/', function () {
    return view('layouts.guest.app');
})->name('dashboard');
Route::resource('warga', WargaController::class);
Route::resource('persil', PersilController::class);
Route::resource('user', UserController::class);
Route::resource('dokumen', DokumenController::class);
Route::resource('penggunaan', JenisPenggunaanController::class);

Route::get('/about', function () {
    return view('pages.about.index');
})->name('pages.about.index');
Route::get('/whatsapp', function () {
    return view('pages.whatsapp.whatsapp');
})->name('whatsapp.form');

Route::resource('persildata/peta', PetaPersilController::class, [
    'as' => 'persildata'
]);

// SENGKETA PERSIL
Route::get('/persildata/sengketa', [SengketaPersilController::class, 'index'])
    ->name('persildata.sengketa.index');


Route::delete('/media/{id}', [MediaController::class, 'destroy'])->name('media.destroy');

Route::resource('sengketa', SengketaPersilController::class);
Route::delete('sengketa/media/{media_id}', [SengketaPersilController::class, 'destroyMedia'])->name('sengketa.media.destroy');
Route::prefix('sengketa')->name('sengketa.')->group(function(){
    Route::get('/', [SengketaPersilController::class,'index'])->name('index');
    Route::get('/create', [SengketaPersilController::class,'create'])->name('create');
    Route::post('/store', [SengketaPersilController::class,'store'])->name('store');
    Route::get('/{id}/edit', [SengketaPersilController::class,'edit'])->name('edit');
    Route::put('/{id}/update', [SengketaPersilController::class,'update'])->name('update');
    Route::delete('/{id}/destroy', [SengketaPersilController::class,'destroy'])->name('destroy');
});


// login/logout



// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');



Route::get('/', function () {
    return view('layouts.guest.app');
})->name('dashboard');
Route::get('/about', function () {
    return view('pages.about.index');
})->name('pages.about.index');
Route::get('/login', [AuthController::class,'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class,'login'])->name('login.post');




Route::middleware('auth')->group(function() {
    Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen.index');
    Route::get('/warga', [WargaController::class, 'index'])->name('warga.index');

    // Route lainnya
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});
