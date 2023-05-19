<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\IcdController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengeluaranObatController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\RekamController;

Route::get('/', [AuthController::class, 'page_login'])->name('login');
Route::post('/login', [AuthController::class, 'auth'])->name('login.auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/poliklinik', [PoliController::class, 'index'])->name('poli');
    Route::post('/poliklinik', [PoliController::class, 'store'])->name('poli.store');
    Route::post('/poliklinik/{id}/update', [PoliController::class, 'update'])->name('poli.update');
    Route::get('/poliklinik/{id}/delete', [PoliController::class, 'delete'])->name('poli.delete');

    Route::get('/getDokter', [DokterController::class, 'getDokter'])->name('getDokter');

    Route::get('/dokter', [DokterController::class, 'index'])->name('dokter');
    Route::post('/dokter/store', [DokterController::class, 'store'])->name('dokter.store');
    Route::post('/dokter/{id}/update', [DokterController::class, 'update'])->name('dokter.update');
    Route::get('/dokter/{id}/delete', [DokterController::class, 'delete'])->name('dokter.delete');

    Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas');
    Route::post('/petugas/store', [PetugasController::class, 'store'])->name('petugas.store');
    Route::post('/petugas/{id}/update', [PetugasController::class, 'update'])->name('petugas.update');
    Route::get('/petugas/{id}/delete', [DokterController::class, 'delete'])->name('petugas.delete');

    Route::get('/pasien', [PasienController::class, 'index'])->name('pasien');
    Route::get('/pasien/add', [PasienController::class, 'add'])->name('pasien.add');
    Route::get('/pasien/{id}/edit', [PasienController::class, 'edit'])->name('pasien.edit');
    Route::get('/pasien/{id}/delete', [PasienController::class, 'delete'])->name('pasien.delete');

    Route::post('/pasien/store', [PasienController::class, 'store'])->name('pasien.store');
    Route::post('/pasien/{id}/update', [PasienController::class, 'update'])->name('pasien.update');

    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');

    Route::get('/obat/json', [ObatController::class, 'data'])->name('obat.data');
    Route::get('/obat', [ObatController::class, 'index'])->name('obat');
    Route::post('/obat/store', [ObatController::class, 'store'])->name('obat.store');
    Route::post('/obat/{id}/update', [ObatController::class, 'update'])->name('obat.update');
    Route::get('/obat/{id}/delete', [ObatController::class, 'delete'])->name('obat.delete');

    Route::get('/icd/json', [IcdController::class, 'data'])->name('icd.data');
    Route::get('/icd', [IcdController::class, 'index'])->name('icd');
    Route::post('/icd/store', [IcdController::class, 'store'])->name('icd.store');
    Route::post('/icd/{id}/update', [IcdController::class, 'update'])->name('icd.update');
    Route::get('/icd/{id}/delete', [IcdController::class, 'delete'])->name('icd.delete');


    Route::get('/rekam', [RekamController::class, 'index'])->name('rekam');
    Route::get('/rekam/add', [RekamController::class, 'add'])->name('rekam.add');

    Route::post('/rekam/store', [RekamController::class, 'store'])->name('rekam.store');
    Route::get('/rekam/pasien/{id}', [RekamController::class, 'detail'])->name('rekam.detail');

    Route::get('/rekam/{id}/delete', [RekamController::class, 'delete'])->name('rekam.delete');

    Route::post('/rekam/pemeriksaan/update', [RekamController::class, 'pemeriksaan_update'])->name('pemeriksaan.update');
    Route::post('/rekam/tindakan/update', [RekamController::class, 'tindakan_update'])->name('tindakan.update');
    Route::post('/rekam/diagnosa/update', [RekamController::class, 'diagnosa_update'])->name('diagnosa.update');

    Route::get('/rekam/status/{id}/{status}/update', [RekamController::class, 'rekam_status'])->name('rekam.status');


    Route::get('/rekam/pasien/resep', [RekamController::class, 'detail'])->name('rekam.upload');

    Route::get('/obat/resep', [PengeluaranObatController::class, 'resep'])->name('obat.resep');
    Route::get('/obat/resep/pengeluaran/{id}', [PengeluaranObatController::class, 'pengeluaran'])->name('obat.pengeluaran');
    Route::post('/obat/pengeluaran/store', [PengeluaranObatController::class, 'store'])->name('obat.pengeluaran.store');
    Route::get('/obat/riwayat', [PengeluaranObatController::class, 'riwayat'])->name('obat.riwayat');


});


