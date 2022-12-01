<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomisiliUsahaLuar;
use App\Http\Controllers\DomisiliUsahaLokal;
use App\Http\Controllers\KeteranganBedaNama;
use App\Http\Controllers\KeteranganJamkesos;
use App\Http\Controllers\KeteranganKtp;
use App\Http\Controllers\KeteranganLahir;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/keterangan/beda-nama', [KeteranganBedaNama::class, 'index'])->name('beda-nama.index');
Route::get('/keterangan/beda-nama/create', [KeteranganBedaNama::class, 'create'])->name('beda-nama.create');
Route::post('/keterangan/beda-nama', [KeteranganBedaNama::class, 'store'])->name('beda-nama.store');
Route::get('/keterangan/beda-nama/{id}/edit', [KeteranganBedaNama::class, 'edit'])->name('beda-nama.edit');
Route::put('/keterangan/beda-nama/{id}', [KeteranganBedaNama::class, 'update'])->name('beda-nama.update');
Route::get('/keterangan/beda-nama/delete/{id}', [KeteranganBedaNama::class, 'destroy'])->name('beda-nama.destroy');
// Ket Usaha Lokal
Route::get('/keterangan/usaha-lokal', [DomisiliUsahaLokal::class, 'index'])->name('usaha-lokal.index');
Route::get('/keterangan/usaha-lokal/create', [DomisiliUsahaLokal::class, 'create'])->name('usaha-lokal.create');
Route::post('/keterangan/usaha-lokal', [DomisiliUsahaLokal::class, 'store'])->name('usaha-lokal.store');
Route::get('/keterangan/usaha-lokal/{id}/edit', [DomisiliUsahaLokal::class, 'edit'])->name('usaha-lokal.edit');
Route::put('/keterangan/usaha-lokal/{id}', [DomisiliUsahaLokal::class, 'update'])->name('usaha-lokal.update');
Route::get('/keterangan/usaha-lokal/delete/{id}', [DomisiliUsahaLokal::class, 'destroy'])->name('usaha-lokal.destroy');
// Ket Usaha Luar
Route::get('/keterangan/usaha-luar', [DomisiliUsahaLuar::class, 'index'])->name('usaha-luar.index');
Route::get('/keterangan/usaha-luar/create', [DomisiliUsahaLuar::class, 'create'])->name('usaha-luar.create');
Route::post('/keterangan/usaha-luar', [DomisiliUsahaLuar::class, 'store'])->name('usaha-luar.store');
Route::get('/keterangan/usaha-luar/{id}/edit', [DomisiliUsahaLuar::class, 'edit'])->name('usaha-luar.edit');
Route::put('/keterangan/usaha-luar/{id}', [DomisiliUsahaLuar::class, 'update'])->name('usaha-luar.update');
Route::get('/keterangan/usaha-luar/delete/{id}', [DomisiliUsahaLuar::class, 'destroy'])->name('usaha-luar.destroy');
//Ket Jamkesos
Route::get('/keterangan/jamkesos', [KeteranganJamkesos::class, 'index'])->name('jamkesos.index');
Route::get('/keterangan/jamkesos/create', [KeteranganJamkesos::class, 'create'])->name('jamkesos.create');
Route::post('/keterangan/jamkesos', [KeteranganJamkesos::class, 'store'])->name('jamkesos.store');
Route::get('/keterangan/jamkesos/{id}/edit', [KeteranganJamkesos::class, 'edit'])->name('jamkesos.edit');
Route::put('/keterangan/jamkesos/{id}', [KeteranganJamkesos::class, 'update'])->name('jamkesos.update');
Route::get('/keterangan/jamkesos/delete/{id}', [KeteranganJamkesos::class, 'destroy'])->name('jamkesos.destroy');
// Ket KTP
Route::get('/keterangan/ktp', [KeteranganKtp::class, 'index'])->name('ktp.index');
Route::get('/keterangan/ktp/create', [KeteranganKtp::class, 'create'])->name('ktp.create');
Route::post('/keterangan/ktp', [KeteranganKtp::class, 'store'])->name('ktp.store');
Route::get('/keterangan/ktp/{id}/edit', [KeteranganKtp::class, 'edit'])->name('ktp.edit');
Route::put('/keterangan/ktp/{id}', [KeteranganKtp::class, 'update'])->name('ktp.update');
Route::get('/keterangan/ktp/delete/{id}', [KeteranganKtp::class, 'destroy'])->name('ktp.destroy');
// Ket Lahir
Route::get('/keterangan/lahir', [KeteranganLahir::class, 'index'])->name('lahir.index');
Route::get('/keterangan/lahir/create', [KeteranganLahir::class, 'create'])->name('lahir.create');
Route::post('/keterangan/lahir', [KeteranganLahir::class, 'store'])->name('lahir.store');
Route::get('/keterangan/lahir/{id}/edit', [KeteranganLahir::class, 'edit'])->name('lahir.edit');
Route::put('/keterangan/lahir/{id}', [KeteranganLahir::class, 'update'])->name('lahir.update');
Route::get('/keterangan/lahir/delete/{id}', [KeteranganLahir::class, 'destroy'])->name('lahir.destroy');
