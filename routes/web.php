<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomisiliUsahaLuar;
use App\Http\Controllers\DomisiliUsahaLokal;
use App\Http\Controllers\IjinKeramaian;
use App\Http\Controllers\KeteranganBedaNama;
use App\Http\Controllers\KeteranganCerai;
use App\Http\Controllers\KeteranganJalan;
use App\Http\Controllers\KeteranganJamkesos;
use App\Http\Controllers\KeteranganKtp;
use App\Http\Controllers\KeteranganLahir;
use App\Http\Controllers\KeteranganMati;
use App\Http\Controllers\KeteranganNikah;
use App\Http\Controllers\KeteranganPengantar;
use App\Http\Controllers\KeteranganPindah;
use App\Http\Controllers\KeteranganRujuk;
use App\Http\Controllers\KeteranganRujukCerai;
use App\Http\Controllers\KeteranganSktm;
use App\Http\Controllers\KeteranganUsaha;
use App\Http\Controllers\KeteranganWali;
use App\Http\Controllers\PermohonanAkta;
use App\Http\Controllers\PermohonanBedaNama;
use App\Http\Controllers\PermohonanCerai;
use App\Http\Controllers\PermohonanKk;
use App\Http\Controllers\PermohonanNikah;
use App\Http\Controllers\PermohonanRubahKk;
use App\Http\Controllers\ProfileController;

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
    return view('homepage');
});

Auth::routes();
Route::group(['middleware' => ['role:user|admin']], function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    Route::get('/cetakuser', [DashboardController::class, 'cetak'])->name('cetak');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    // Ket Beda Nama
    Route::get('/keterangan/beda-nama/show', [KeteranganBedaNama::class, 'show'])->name('beda-nama.show');
    Route::get('/keterangan/beda-nama/{id}/edit', [KeteranganBedaNama::class, 'edit'])->name('beda-nama.edit');
    Route::put('/keterangan/beda-nama/{id}', [KeteranganBedaNama::class, 'update'])->name('beda-nama.update');
    Route::get('/keterangan/beda-nama/cetak/{id}', [KeteranganBedaNama::class, 'cetak'])->name('beda-nama.cetak');
    // Ket Usaha Lokal
    Route::get('/keterangan/usaha-lokal/show', [DomisiliUsahaLokal::class, 'show'])->name('usaha-lokal.show');
    Route::get('/keterangan/usaha-lokal/{id}/edit', [DomisiliUsahaLokal::class, 'edit'])->name('usaha-lokal.edit');
    Route::put('/keterangan/usaha-lokal/{id}', [DomisiliUsahaLokal::class, 'update'])->name('usaha-lokal.update');
    Route::get('/keterangan/usaha-lokal/cetak/{id}', [DomisiliUsahaLokal::class, 'cetak'])->name('usaha-lokal.cetak');
    // Ket Usaha Luar
    Route::get('/keterangan/usaha-luar/show', [DomisiliUsahaLuar::class, 'show'])->name('usaha-luar.show');
    Route::get('/keterangan/usaha-luar/{id}/edit', [DomisiliUsahaLuar::class, 'edit'])->name('usaha-luar.edit');
    Route::put('/keterangan/usaha-luar/{id}', [DomisiliUsahaLuar::class, 'update'])->name('usaha-luar.update');
    Route::get('/keterangan/usaha-luar/cetak/{id}', [DomisiliUsahaLuar::class, 'cetak'])->name('usaha-luar.cetak');
    //Ket Jamkesos
    Route::get('/keterangan/jamkesos/show', [KeteranganJamkesos::class, 'show'])->name('jamkesos.show');
    Route::get('/keterangan/jamkesos/{id}/edit', [KeteranganJamkesos::class, 'edit'])->name('jamkesos.edit');
    Route::put('/keterangan/jamkesos/{id}', [KeteranganJamkesos::class, 'update'])->name('jamkesos.update');
    Route::get('/keterangan/jamkesos/cetak/{id}', [KeteranganJamkesos::class, 'cetak'])->name('jamkesos.cetak');
    // Ket KTP
    Route::get('/keterangan/ktp/show', [KeteranganKtp::class, 'show'])->name('ktp.show');
    Route::get('/keterangan/ktp/{id}/edit', [KeteranganKtp::class, 'edit'])->name('ktp.edit');
    Route::put('/keterangan/ktp/{id}', [KeteranganKtp::class, 'update'])->name('ktp.update');
    Route::get('/keterangan/ktp/cetak/{id}', [KeteranganKtp::class, 'cetak'])->name('ktp.cetak');
    // Ket Lahir
    Route::get('/keterangan/lahir/show', [KeteranganLahir::class, 'show'])->name('lahir.show');
    Route::get('/keterangan/lahir/{id}/edit', [KeteranganLahir::class, 'edit'])->name('lahir.edit');
    Route::put('/keterangan/lahir/{id}', [KeteranganLahir::class, 'update'])->name('lahir.update');
    Route::get('/keterangan/lahir/cetak/{id}', [KeteranganLahir::class, 'cetak'])->name('lahir.cetak');
    // Ket Mati
    Route::get('/keterangan/mati/show', [KeteranganMati::class, 'show'])->name('mati.show');
    Route::get('/keterangan/mati/{id}/edit', [KeteranganMati::class, 'edit'])->name('mati.edit');
    Route::put('/keterangan/mati/{id}', [KeteranganMati::class, 'update'])->name('mati.update');
    Route::get('/keterangan/mati/cetak/{id}', [KeteranganMati::class, 'cetak'])->name('mati.cetak');
    // Ket Nikah
    Route::get('/keterangan/nikah/show', [KeteranganNikah::class, 'show'])->name('nikah.show');
    Route::get('/keterangan/nikah/{id}/edit', [KeteranganNikah::class, 'edit'])->name('nikah.edit');
    Route::put('/keterangan/nikah/{id}', [KeteranganNikah::class, 'update'])->name('nikah.update');
    Route::get('/keterangan/nikah/cetak/{id}', [KeteranganNikah::class, 'cetak'])->name('nikah.cetak');
    // Ket Pengantar
    Route::get('/keterangan/pengantar/show', [KeteranganPengantar::class, 'show'])->name('pengantar.show');
    Route::get('/keterangan/pengantar/{id}/edit', [KeteranganPengantar::class, 'edit'])->name('pengantar.edit');
    Route::put('/keterangan/pengantar/{id}', [KeteranganPengantar::class, 'update'])->name('pengantar.update');
    Route::get('/keterangan/pengantar/cetak/{id}', [KeteranganPengantar::class, 'cetak'])->name('pengantar.cetak');
    // Ket Pindah
    Route::get('/keterangan/pindah/show', [KeteranganPindah::class, 'show'])->name('pindah.show');
    Route::get('/keterangan/pindah/{id}/edit', [KeteranganPindah::class, 'edit'])->name('pindah.edit');
    Route::put('/keterangan/pindah/{id}', [KeteranganPindah::class, 'update'])->name('pindah.update');
    Route::get('/keterangan/pindah/cetak/{id}', [KeteranganPindah::class, 'cetak'])->name('pindah.cetak');
    // Ket Rujuk
    Route::get('/keterangan/rujuk/show', [KeteranganRujuk::class, 'show'])->name('rujuk.show');
    Route::get('/keterangan/rujuk/{id}/edit', [KeteranganRujuk::class, 'edit'])->name('rujuk.edit');
    Route::put('/keterangan/rujuk/{id}', [KeteranganRujuk::class, 'update'])->name('rujuk.update');
    Route::get('/keterangan/rujuk/cetak/{id}', [KeteranganRujuk::class, 'cetak'])->name('rujuk.cetak');
    // Ket Cerai
    Route::get('/keterangan/cerai/show', [KeteranganCerai::class, 'show'])->name('cerai.show');
    Route::get('/keterangan/cerai/{id}/edit', [KeteranganCerai::class, 'edit'])->name('cerai.edit');
    Route::get('/keterangan/cerai/cetak/{id}', [KeteranganCerai::class, 'cetak'])->name('cerai.cetak');
    Route::put('/keterangan/cerai/{id}', [KeteranganCerai::class, 'update'])->name('cerai.update');
    // Ket SKTM
    Route::get('/keterangan/sktm/show', [KeteranganSktm::class, 'show'])->name('sktm.show');
    Route::get('/keterangan/sktm/{id}/edit', [KeteranganSktm::class, 'edit'])->name('sktm.edit');
    Route::put('/keterangan/sktm/{id}', [KeteranganSktm::class, 'update'])->name('sktm.update');
    Route::get('/keterangan/sktm/cetak/{id}', [KeteranganSktm::class, 'cetak'])->name('sktm.cetak');
    // Ket Usaha
    Route::get('/keterangan/usaha/show', [KeteranganUsaha::class, 'show'])->name('usaha.show');
    Route::get('/keterangan/usaha/cetak/{id}', [KeteranganUsaha::class, 'cetak'])->name('usaha.cetak');
    Route::get('/keterangan/usaha/{id}/edit', [KeteranganUsaha::class, 'edit'])->name('usaha.edit');
    Route::put('/keterangan/usaha/{id}', [KeteranganUsaha::class, 'update'])->name('usaha.update');
    // Ket Wali
    Route::get('/keterangan/wali/show', [KeteranganWali::class, 'show'])->name('wali.show');
    Route::get('/keterangan/wali/{id}/edit', [KeteranganWali::class, 'edit'])->name('wali.edit');
    Route::put('/keterangan/wali/{id}', [KeteranganWali::class, 'update'])->name('wali.update');
    Route::get('/keterangan/wali/cetak/{id}', [KeteranganWali::class, 'cetak'])->name('wali.cetak');
    // Ket Jalan
    Route::get('/keterangan/jalan/show', [KeteranganJalan::class, 'show'])->name('jalan.show');
    Route::get('/keterangan/jalan/cetak/{id}', [KeteranganJalan::class, 'cetak'])->name('jalan.cetak');
    Route::get('/keterangan/jalan/{id}/edit', [KeteranganJalan::class, 'edit'])->name('jalan.edit');
    Route::put('/keterangan/jalan/{id}', [KeteranganJalan::class, 'update'])->name('jalan.update');
    // Permohonan Akta
    Route::get('/permohonan/akta/show', [PermohonanAkta::class, 'show'])->name('akta.show');
    Route::get('/permohonan/akta/cetak/{id}', [PermohonanAkta::class, 'cetak'])->name('akta.cetak');
    Route::get('/permohonan/akta/{id}/edit', [PermohonanAkta::class, 'edit'])->name('akta.edit');
    Route::put('/permohonan/akta/{id}', [PermohonanAkta::class, 'update'])->name('akta.update');
    // Permohonan Beda Nama
    Route::get('/permohonan/bedanama/show', [PermohonanBedaNama::class, 'show'])->name('bedanama.show');
    Route::get('/permohonan/bedanama/cetak/{id}', [PermohonanBedaNama::class, 'cetak'])->name('bedanama.cetak');
    Route::get('/permohonan/bedanama/{id}/edit', [PermohonanBedaNama::class, 'edit'])->name('bedanama.edit');
    Route::put('/permohonan/bedanama/{id}', [PermohonanBedaNama::class, 'update'])->name('bedanama.update');
    // Permohonan KK
    Route::get('/permohonan/kk/show', [PermohonanKk::class, 'show'])->name('kk.show');
    Route::get('/permohonan/kk/{id}/edit', [PermohonanKk::class, 'edit'])->name('kk.edit');
    Route::put('/permohonan/kk/{id}', [PermohonanKk::class, 'update'])->name('kk.update');
    Route::get('/permohonan/kk/cetak/{id}', [PermohonanKk::class, 'cetak'])->name('kk.cetak');
    // Permohonan Nikah
    Route::get('/permohonan/nikah/show', [PermohonanNikah::class, 'show'])->name('mohon-nikah.show');
    Route::get('/permohonan/nikah/{id}/edit', [PermohonanNikah::class, 'edit'])->name('mohon-nikah.edit');
    Route::put('/permohonan/nikah/{id}', [PermohonanNikah::class, 'update'])->name('mohon-nikah.update');
    Route::get('/permohonan/nikah/cetak/{id}', [PermohonanNikah::class, 'cetak'])->name('mohon-nikah.cetak');
    // Permohonan Rubah KK
    Route::get('/permohonan/rubah-kk/show', [PermohonanRubahKk::class, 'show'])->name('rubah-kk.show');
    Route::get('/permohonan/rubah-kk/{id}/edit', [PermohonanRubahKk::class, 'edit'])->name('rubah-kk.edit');
    Route::put('/permohonan/rubah-kk/{id}', [PermohonanRubahKk::class, 'update'])->name('rubah-kk.update');
    Route::get('/permohonan/rubah-kk/cetak/{id}', [PermohonanRubahKk::class, 'cetak'])->name('rubah-kk.cetak');
    // Perijinan Keramaian
    Route::get('perijinan/keramaian/show', [IjinKeramaian::class, 'show'])->name('keramaian.show');
    Route::get('perijinan/keramaian/cetak/{id}', [IjinKeramaian::class, 'cetak'])->name('keramaian.cetak');
    Route::get('perijinan/keramaian/{id}/edit', [IjinKeramaian::class, 'edit'])->name('keramaian.edit');
    Route::put('perijinan/keramaian/{id}', [IjinKeramaian::class, 'update'])->name('keramaian.update');
    // Permohonan Cerai
    Route::get('/permohonan/cerai/show', [PermohonanCerai::class, 'show'])->name('mohon-cerai.show');
    Route::get('/permohonan/cerai/cetak/{id}', [PermohonanCerai::class, 'cetak'])->name('mohon-cerai.cetak');
    Route::get('/permohonan/cerai/{id}/edit', [PermohonanCerai::class, 'edit'])->name('mohon-cerai.edit');
    Route::put('/permohonan/cerai/{id}', [PermohonanCerai::class, 'update'])->name('mohon-cerai.update');
});
Route::group(['middleware' => ['role:admin']], function () {
    // Ket Beda-nama
    Route::get('/keterangan/beda-nama', [KeteranganBedaNama::class, 'index'])->name('beda-nama.index');
    Route::get('/keterangan/beda-nama/create', [KeteranganBedaNama::class, 'create'])->name('beda-nama.create');
    Route::post('/keterangan/beda-nama', [KeteranganBedaNama::class, 'store'])->name('beda-nama.store');
    Route::get('/keterangan/beda-nama/delete/{id}', [KeteranganBedaNama::class, 'destroy'])->name('beda-nama.destroy');
    // Ket Usaha Lokal
    Route::get('/keterangan/usaha-lokal', [DomisiliUsahaLokal::class, 'index'])->name('usaha-lokal.index');
    Route::get('/keterangan/usaha-lokal/create', [DomisiliUsahaLokal::class, 'create'])->name('usaha-lokal.create');
    Route::post('/keterangan/usaha-lokal', [DomisiliUsahaLokal::class, 'store'])->name('usaha-lokal.store');
    Route::get('/keterangan/usaha-lokal/delete/{id}', [DomisiliUsahaLokal::class, 'destroy'])->name('usaha-lokal.destroy');
    // Ket Usaha Luar
    Route::get('/keterangan/usaha-luar', [DomisiliUsahaLuar::class, 'index'])->name('usaha-luar.index');
    Route::get('/keterangan/usaha-luar/create', [DomisiliUsahaLuar::class, 'create'])->name('usaha-luar.create');
    Route::post('/keterangan/usaha-luar', [DomisiliUsahaLuar::class, 'store'])->name('usaha-luar.store');
    Route::get('/keterangan/usaha-luar/delete/{id}', [DomisiliUsahaLuar::class, 'destroy'])->name('usaha-luar.destroy');
    //Ket Jamkesos
    Route::get('/keterangan/jamkesos', [KeteranganJamkesos::class, 'index'])->name('jamkesos.index');
    Route::get('/keterangan/jamkesos/create', [KeteranganJamkesos::class, 'create'])->name('jamkesos.create');
    Route::post('/keterangan/jamkesos', [KeteranganJamkesos::class, 'store'])->name('jamkesos.store');
    Route::get('/keterangan/jamkesos/delete/{id}', [KeteranganJamkesos::class, 'destroy'])->name('jamkesos.destroy');
    // Ket KTP
    Route::get('/keterangan/ktp', [KeteranganKtp::class, 'index'])->name('ktp.index');
    Route::get('/keterangan/ktp/create', [KeteranganKtp::class, 'create'])->name('ktp.create');
    Route::post('/keterangan/ktp', [KeteranganKtp::class, 'store'])->name('ktp.store');
    Route::get('/keterangan/ktp/delete/{id}', [KeteranganKtp::class, 'destroy'])->name('ktp.destroy');
    // Ket Lahir
    Route::get('/keterangan/lahir', [KeteranganLahir::class, 'index'])->name('lahir.index');
    Route::get('/keterangan/lahir/create', [KeteranganLahir::class, 'create'])->name('lahir.create');
    Route::post('/keterangan/lahir', [KeteranganLahir::class, 'store'])->name('lahir.store');
    Route::get('/keterangan/lahir/delete/{id}', [KeteranganLahir::class, 'destroy'])->name('lahir.destroy');
    // Ket Mati
    Route::get('/keterangan/mati', [KeteranganMati::class, 'index'])->name('mati.index');
    Route::get('/keterangan/mati/create', [KeteranganMati::class, 'create'])->name('mati.create');
    Route::post('/keterangan/mati', [KeteranganMati::class, 'store'])->name('mati.store');
    Route::get('/keterangan/mati/delete/{id}', [KeteranganMati::class, 'destroy'])->name('mati.destroy');
    // Ket Nikah
    Route::get('/keterangan/nikah', [KeteranganNikah::class, 'index'])->name('nikah.index');
    Route::get('/keterangan/nikah/create', [KeteranganNikah::class, 'create'])->name('nikah.create');
    Route::post('/keterangan/nikah', [KeteranganNikah::class, 'store'])->name('nikah.store');
    Route::get('/keterangan/nikah/delete/{id}', [KeteranganNikah::class, 'destroy'])->name('nikah.destroy');
    // Ket Pengantar
    Route::get('/keterangan/pengantar', [KeteranganPengantar::class, 'index'])->name('pengantar.index');
    Route::get('/keterangan/pengantar/create', [KeteranganPengantar::class, 'create'])->name('pengantar.create');
    Route::post('/keterangan/pengantar', [KeteranganPengantar::class, 'store'])->name('pengantar.store');
    Route::get('/keterangan/pengantar/delete/{id}', [KeteranganPengantar::class, 'destroy'])->name('pengantar.destroy');
    // Ket Pindah
    Route::get('/keterangan/pindah', [KeteranganPindah::class, 'index'])->name('pindah.index');
    Route::get('/keterangan/pindah/delete/{id}', [KeteranganPindah::class, 'destroy'])->name('pindah.destroy');
    Route::get('/keterangan/pindah/create', [KeteranganPindah::class, 'create'])->name('pindah.create');
    Route::post('/keterangan/pindah', [KeteranganPindah::class, 'store'])->name('pindah.store');
    // Ket Rujuk
    Route::get('/keterangan/rujuk', [KeteranganRujuk::class, 'index'])->name('rujuk.index');
    Route::get('/keterangan/rujuk/create', [KeteranganRujuk::class, 'create'])->name('rujuk.create');
    Route::post('/keterangan/rujuk', [KeteranganRujuk::class, 'store'])->name('rujuk.store');
    Route::get('/keterangan/rujuk/delete/{id}', [KeteranganRujuk::class, 'destroy'])->name('rujuk.destroy');
    // Ket Cerai
    Route::get('/keterangan/cerai', [KeteranganCerai::class, 'index'])->name('cerai.index');
    Route::get('/keterangan/cerai/create', [KeteranganCerai::class, 'create'])->name('cerai.create');
    Route::post('/keterangan/cerai', [KeteranganCerai::class, 'store'])->name('cerai.store');
    Route::get('/keterangan/cerai/delete/{id}', [KeteranganCerai::class, 'destroy'])->name('cerai.destroy');
    // Ket SKTM
    Route::get('/keterangan/sktm', [KeteranganSktm::class, 'index'])->name('sktm.index');
    Route::get('/keterangan/sktm/create', [KeteranganSktm::class, 'create'])->name('sktm.create');
    Route::post('/keterangan/sktm', [KeteranganSktm::class, 'store'])->name('sktm.store');
    Route::get('/keterangan/sktm/delete/{id}', [KeteranganSktm::class, 'destroy'])->name('sktm.destroy');
    // Ket Usaha
    Route::get('/keterangan/usaha', [KeteranganUsaha::class, 'index'])->name('usaha.index');
    Route::get('/keterangan/usaha/create', [KeteranganUsaha::class, 'create'])->name('usaha.create');
    Route::post('/keterangan/usaha', [KeteranganUsaha::class, 'store'])->name('usaha.store');
    Route::get('/keterangan/usaha/delete/{id}', [KeteranganUsaha::class, 'destroy'])->name('usaha.destroy');
    // Ket Wali
    Route::get('/keterangan/wali', [KeteranganWali::class, 'index'])->name('wali.index');
    Route::get('/keterangan/wali/create', [KeteranganWali::class, 'create'])->name('wali.create');
    Route::post('/keterangan/wali', [KeteranganWali::class, 'store'])->name('wali.store');
    Route::get('/keterangan/wali/delete/{id}', [KeteranganWali::class, 'destroy'])->name('wali.destroy');
    // Ket Jalan
    Route::get('/keterangan/jalan', [KeteranganJalan::class, 'index'])->name('jalan.index');
    Route::get('/keterangan/jalan/create', [KeteranganJalan::class, 'create'])->name('jalan.create');
    Route::post('/keterangan/jalan', [KeteranganJalan::class, 'store'])->name('jalan.store');
    Route::get('/keterangan/jalan/delete/{id}', [KeteranganJalan::class, 'destroy'])->name('jalan.destroy');
    // Permohonan Akta
    Route::get('/permohonan/akta', [PermohonanAkta::class, 'index'])->name('akta.index');
    Route::get('/permohonan/akta/create', [PermohonanAkta::class, 'create'])->name('akta.create');
    Route::post('/permohonan/akta', [PermohonanAkta::class, 'store'])->name('akta.store');
    Route::get('/permohonan/akta/delete/{id}', [PermohonanAkta::class, 'destroy'])->name('akta.destroy');
    // Permohonan Beda Nama
    Route::get('/permohonan/bedanama', [PermohonanBedaNama::class, 'index'])->name('bedanama.index');
    Route::get('/permohonan/bedanama/create', [PermohonanBedaNama::class, 'create'])->name('bedanama.create');
    Route::post('/permohonan/bedanama', [PermohonanBedaNama::class, 'store'])->name('bedanama.store');
    Route::get('/permohonan/bedanama/delete/{id}', [PermohonanBedaNama::class, 'destroy'])->name('bedanama.destroy');
    // Permohonan KK
    Route::get('/permohonan/kk', [PermohonanKk::class, 'index'])->name('kk.index');
    Route::get('/permohonan/kk/create', [PermohonanKk::class, 'create'])->name('kk.create');
    Route::post('/permohonan/kk', [PermohonanKk::class, 'store'])->name('kk.store');
    Route::get('/permohonan/kk/delete/{id}', [PermohonanKk::class, 'destroy'])->name('kk.destroy');
    // Permohonan Nikah
    Route::get('/permohonan/nikah', [PermohonanNikah::class, 'index'])->name('mohon-nikah.index');
    Route::get('/permohonan/nikah/create', [PermohonanNikah::class, 'create'])->name('mohon-nikah.create');
    Route::post('/permohonan/nikah', [PermohonanNikah::class, 'store'])->name('mohon-nikah.store');
    Route::get('/permohonan/nikah/delete/{id}', [PermohonanNikah::class, 'destroy'])->name('mohon-nikah.destroy');
    // Permohonan Rubah KK
    Route::get('/permohonan/rubah-kk', [PermohonanRubahKk::class, 'index'])->name('rubah-kk.index');
    Route::get('/permohonan/rubah-kk/create', [PermohonanRubahKk::class, 'create'])->name('rubah-kk.create');
    Route::post('/permohonan/rubah-kk', [PermohonanRubahKk::class, 'store'])->name('rubah-kk.store');
    Route::get('/permohonan/rubah-kk/delete/{id}', [PermohonanRubahKk::class, 'destroy'])->name('rubah-kk.destroy');
    // Perijinan Keramaian
    Route::get('perijinan/keramaian', [IjinKeramaian::class, 'index'])->name('keramaian.index');
    Route::get('perijinan/keramaian/create', [IjinKeramaian::class, 'create'])->name('keramaian.create');
    Route::post('perijinan/keramaian', [IjinKeramaian::class, 'store'])->name('keramaian.store');
    Route::get('perijinan/keramaian/delete/{id}', [IjinKeramaian::class, 'destroy'])->name('keramaian.destroy');
    // Permohonan Cerai
    Route::get('/permohonan/cerai', [PermohonanCerai::class, 'index'])->name('mohon-cerai.index');
    Route::get('/permohonan/cerai/create', [PermohonanCerai::class, 'create'])->name('mohon-cerai.create');
    Route::post('/permohonan/cerai', [PermohonanCerai::class, 'store'])->name('mohon-cerai.store');
    Route::get('/permohonan/cerai/delete/{id}', [PermohonanCerai::class, 'destroy'])->name('mohon-cerai.destroy');
});
