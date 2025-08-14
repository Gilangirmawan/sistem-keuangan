<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('/layouts/app');
});

Route::get('/dashboard', function () {
    return view('page.dashboard');
})->name('dashboard');


Route::resource('transaksi', TransaksiController::class);
// Route::get('/transaksi', function () {
//     return view('page.transaksi');
// })->name('transaksi');;
