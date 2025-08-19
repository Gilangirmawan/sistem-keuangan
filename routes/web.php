<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LabaController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\BukuController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('/layouts/app');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');


Route::resource('transaksi', TransaksiController::class);
// Route::get('/transaksi', function () {
//     return view('page.transaksi');
// })->name('transaksi');;

Route::get('/pemasukan', function () {
    return view('admin.pemasukan');
})->name('pemasukan');

Route::get('/pengeluaran', function () {
    return view('admin.pengeluaran');
})->name('pengeluaran');


Route::get('/kategori', function () {
    return view('admin.kategori');
})->name('kategori');

#Route::resource('pemasukan', PemasukanController::class);

Route::resource('pemasukan', PemasukanController::class);
Route::resource('pengeluaran', PengeluaranController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('laba', LabaController::class);
Route::resource('kas', KasController::class);
Route::resource('buku', BukuController::class);
