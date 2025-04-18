<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\ObatController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dokter', [HomeController::class, 'dokter'])->name('dokter');
Route::get('/pasien', [HomeController::class, 'pasien'])->name('pasien');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('dokter')->group(function() {
    Route::resource('obat', ObatController::class);
    Route::resource('periksa', PeriksaController::class);
});

Route::prefix('pasien')->group(function() {
    Route::resource('periksa', PeriksaControllerPn::class);
    Route::resource('riwayat', RiwayatController::class);
});
