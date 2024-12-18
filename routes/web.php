<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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



Route::get('/home', [HomeController::class, 'index'])->name('home');

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
    Route::get('/jadwal/periksa', [App\Http\Controllers\JadwalController::class, 'createperiksa'])->name('jadwal.periksa');
    Route::post('/jadwal/store', [App\Http\Controllers\JadwalController::class, 'store'])->name('jadwal.store');
    Route::get('/jadwal/edit/{id}', [App\Http\Controllers\JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::post('/jadwal/update/{id}', [App\Http\Controllers\JadwalController::class, 'update'])->name('jadwal.update');
    Route::delete('/jadwal/{id}', [App\Http\Controllers\JadwalController::class, 'destroy'])->name('jadwal.destroy');
    Route::get('/jadwal/{id}', [App\Http\Controllers\JadwalController::class, 'show'])->name('jadwal.show');


    // ini route pengingat
    Route::get('/ingat', [App\Http\Controllers\JadwalController::class, 'ingat'])->name('jadwal.pengingat');
    Route::post('/ingat/proses', [App\Http\Controllers\JadwalController::class, 'storeJadwalPengingat'])->name('jadwal.storeJadwalPengingat');
    Route::post('/ingat/store', [App\Http\Controllers\JadwalController::class, 'storeJadwalPeriksa'])->name('jadwal.storeJadwalPeriksa');
    Route::get('/ingat/edit/{id}', [App\Http\Controllers\JadwalController::class, 'ingatEdit'])->name('jadwal.pengingat.edit');
    Route::post('/ingat/update/{id}', [App\Http\Controllers\JadwalController::class, 'ingatUpdate'])->name('jadwal.pengingat.update');
    Route::delete('/ingat/{id}', [App\Http\Controllers\JadwalController::class, 'ingatDestroy'])->name('jadwal.pengingat.destroy');
    Route::post('/ingat/update-jadwal/{id}', [App\Http\Controllers\JadwalController::class, 'updateJadwalPengingat'])->name('jadwal.updateJadwalPengingat');
    Route::post('/periksa/update/{id}', [App\Http\Controllers\JadwalController::class, 'updateJadwalPeriksa'])->name('jadwal.updateJadwalPeriksa');


    // ini adalah route untuk riwayat pasien
    Route::get('/riwayat', [App\Http\Controllers\RiwayatController::class, 'index'])->name('riwayat');
    Route::get('/riwayat/create', [App\Http\Controllers\RiwayatController::class, 'create'])->name('riwayat.create');
    Route::post('/riwayat/store', [App\Http\Controllers\RiwayatController::class, 'store'])->name('riwayat.store');
    Route::get('/riwayat/edit/{id}', [App\Http\Controllers\RiwayatController::class, 'edit'])->name('riwayat.edit');
    Route::post('/riwayat/update/{id}', [App\Http\Controllers\RiwayatController::class, 'update'])->name('riwayat.update');
    Route::delete('/riwayat/{id}', [App\Http\Controllers\RiwayatController::class, 'destroy'])->name('riwayat.destroy');
    Route::get('/riwayat/{id}', [App\Http\Controllers\RiwayatController::class, 'show'])->name('riwayat.show');
});


