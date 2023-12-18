<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrasiPenggunaController;
use App\Http\Controllers\MobilController;

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


Route::get('/registrasi-pelanggan', [RegistrasiPenggunaController::class, 'addPelanggan'])->name('registrasi_pelanggan.addPelanggan');
Route::post('/registrasi-pelanggan', [RegistrasiPenggunaController::class, 'storePelanggan'])->name('registrasi_pelanggan.storePelanggan');

Route::get('/', [RegistrasiPenggunaController::class, 'formLogin'])->name('login_pelanggan.homeLogin');
Route::get('/login-pelanggan', [RegistrasiPenggunaController::class, 'formLogin'])->name('login_pelanggan.formLogin');
Route::post('/login-pelanggan', [RegistrasiPenggunaController::class, 'prosesLogin'])->name('login_pelanggan.prosesLogin');

Route::get('/logout-pelanggan', [RegistrasiPenggunaController::class, 'prosesLogout'])->name('logout_pelanggan.prosesLogout');

Route::get('/tambah-mobil', [MobilController::class, 'addMobil'])->name('mobil.addMobil');
Route::post('/tambah-mobil', [MobilController::class, 'storeMobil'])->name('mobil.storeMobil');
Route::get('/daftar-mobil', [MobilController::class, 'listMobil'])->name('mobil.listMobil');
Route::get('/cari-mobil', [MobilController::class, 'searchMobil'])->name('mobil.searchMobil');

Route::get('/rental/{mobilId}',  [MobilController::class, 'formRental'])->name('mobil.formRental');
Route::post('/rental/{mobilId}',  [MobilController::class, 'storeRental'])->name('mobil.storeRental');
Route::get('/daftar-rental',  [MobilController::class, 'daftarRental'])->name('mobil.daftarRental');

Route::get('/pengembalian', [MobilController::class, 'formPengembalian'])->name('mobil.formPengembalian');
Route::post('/pengembalian', [MobilController::class, 'prosesPengembalian'])->name('mobil.prosesPengembalian');

