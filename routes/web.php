<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemesananController;

Route::get('/', [PemesananController::class, 'dashboard']);
Route::get('/dashboard', [PemesananController::class, 'dashboard']);
Route::get('/penumpang', [PemesananController::class, 'penumpang']);
Route::get('/penumpang/{id}/edit', [PemesananController::class, 'editPenumpang']);
Route::post('/penumpang/{id}/update', [PemesananController::class, 'updatePenumpang']);
Route::get('/penumpang/{id}/hapus', [PemesananController::class, 'hapusPenumpang']);
Route::get('/penumpang/create', [PemesananController::class, 'createPenumpang']);
Route::post('/penumpang', [PemesananController::class, 'storePenumpang']);
Route::get('/penumpang/{id}', [PemesananController::class, 'detailPenumpang']);
Route::get('/kereta', [PemesananController::class, 'kereta']);
Route::get('/kereta/create', [PemesananController::class, 'createKereta']);
Route::post('/kereta', [PemesananController::class, 'storeKereta']);
Route::get('/jadwal', [PemesananController::class, 'jadwal']);
Route::get('/jadwal/create', [PemesananController::class, 'createJadwal']);
Route::post('/jadwal', [PemesananController::class, 'storeJadwal']);
Route::get('/pemesanan', [PemesananController::class, 'pemesanan']);
Route::get('/pemesanan/create', [PemesananController::class, 'createPemesanan']);
Route::post('/pemesanan', [PemesananController::class, 'storePemesanan']);
Route::get('/laporan', [PemesananController::class, 'laporan']);