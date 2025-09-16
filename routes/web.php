<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KasController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\LabaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PengeluaranController;

Route::get('/', function () {
    return view('main');
})->middleware('guest')->name('home');

Route::get('/preview', [App\Http\Controllers\HomeController::class, 'index'])
    ->middleware('guest')
    ->name('preview');

Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Laporan Laba Rugi
    Route::get('laba', [LabaController::class, 'index'])->name('laba.index');

    // Ekspor Buku Besar
    Route::get('buku/export/pdf', [BukuController::class, 'exportPdf'])->name('buku.export.pdf');
    Route::get('buku/export/csv', [BukuController::class, 'exportCsv'])->name('buku.export.csv');

    // Resource Controllers
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('pemasukan', PemasukanController::class);
    Route::resource('pengeluaran', PengeluaranController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('kas', KasController::class);
    Route::resource('buku', BukuController::class);
});
