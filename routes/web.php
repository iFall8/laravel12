<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\PeriksaControllerPn;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dokter', [HomeController::class, 'dokter'])->name('dokter');
Route::get('/pasien', [HomeController::class, 'pasien'])->name('pasien');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('dokter')->middleware('checkrole:dokter')->group(function () {
    Route::resource('obat', ObatController::class);
    Route::get('periksa', [PeriksaController::class, 'index']);
    Route::get('periksa/{id}/edit', [PeriksaController::class, 'edit']);
    Route::put('periksa/{id}', [PeriksaController::class, 'update']);
    Route::delete('periksa/{id}', [PeriksaController::class, 'destroy']);
});

Route::prefix('pasien')->middleware('checkrole:pasien')->group(function () {
    Route::resource('periksa', PeriksaControllerPn::class);
    Route::resource('riwayat', RiwayatController::class);
});
