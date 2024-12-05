<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    // ini adalah route untuk pasien
    Route::get('/pasien', [App\Http\Controllers\PasienController::class, 'index'])->name('pasien.index');
    Route::get('/pasien/create', [App\Http\Controllers\PasienController::class, 'create'])->name('pasien.create');
    Route::post('/pasien/store', [App\Http\Controllers\PasienController::class, 'store'])->name('pasien.store');
    Route::get('/pasien/edit/{id}', [App\Http\Controllers\PasienController::class, 'edit'])->name('pasien.edit');
    Route::put('/pasien/update/{id}', [App\Http\Controllers\PasienController::class, 'update'])->name('pasien.update');
    Route::delete('/pasien/{id}', [App\Http\Controllers\PasienController::class, 'destroy'])->name('pasien.destroy');
    Route::get('/pasien/search', [App\Http\Controllers\PasienController::class, 'search'])->name('pasien.search');

    // ini adalah route untuk jadwal pasien
    Route::get('/jadwal', [App\Http\Controllers\JadwalController::class, 'index'])->name('jadwal');
    Route::get('/jadwal/create', [App\Http\Controllers\JadwalController::class, 'create'])->name('jadwal.create');
    Route::post('/jadwal/store', [App\Http\Controllers\JadwalController::class, 'store'])->name('jadwal.store');
    Route::get('/jadwal/edit/{id}', [App\Http\Controllers\JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::post('/jadwal/update/{id}', [App\Http\Controllers\JadwalController::class, 'update'])->name('jadwal.update');
    Route::delete('/jadwal/{id}', [App\Http\Controllers\JadwalController::class, 'destroy'])->name('jadwal.destroy');
    Route::get('/jadwal/{id}', [App\Http\Controllers\JadwalController::class, 'show'])->name('jadwal.show');


    // ini adalah route untuk riwayat pasien
    Route::get('/riwayat', [App\Http\Controllers\RiwayatController::class, 'index'])->name('riwayat');
    Route::get('/riwayat/create', [App\Http\Controllers\RiwayatController::class, 'create'])->name('riwayat.create');
    Route::post('/riwayat/store', [App\Http\Controllers\RiwayatController::class, 'store'])->name('riwayat.store');
    Route::get('/riwayat/edit/{id}', [App\Http\Controllers\RiwayatController::class, 'edit'])->name('riwayat.edit');
    Route::post('/riwayat/update/{id}', [App\Http\Controllers\RiwayatController::class, 'update'])->name('riwayat.update');
    Route::delete('/riwayat/{id}', [App\Http\Controllers\RiwayatController::class, 'destroy'])->name('riwayat.destroy');
    Route::get('/riwayat/{id}', [App\Http\Controllers\RiwayatController::class, 'show'])->name('riwayat.show');
});


