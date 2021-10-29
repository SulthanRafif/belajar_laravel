<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelangganController;

Route::view('/about', 'v_about', [
    'nama' => 'Sulthan Rafif',
    'alamat' => '<h1>Malang, Jawa Timur</h1>'
]);

Route::view('/guru', 'admin.guru.v_dataguru');
Route::view('/contact', 'contact');

Route::get('/home/about/{id}', [HomeController::class, 'about']);

Auth::routes();

Route::get('/', [HomeController::class, 'index']);
// hak akses untuk admin
Route::group(['middleware' => 'admin'], function () {
    // user
    Route::get('/guru', [GuruController::class, 'index'])->name('guru');
    Route::get('/guru/detail/{id_guru}', [GuruController::class, 'detail']);
    Route::get('/guru/add', [GuruController::class, 'add']);
    Route::post('/guru/insert', [GuruController::class, 'insert']);
    Route::get('/guru/edit/{id_guru}', [GuruController::class, 'edit']);
    Route::post('/guru/update/{id_guru}', [GuruController::class, 'update']);
    Route::get('/guru/delete/{id_guru}', [GuruController::class, 'delete']);

    // siswa
    Route::get('/siswa', [SiswaController::class, 'index']);
});

Route::group(['middleware' => 'user'], function () {
    // User
    Route::get('/user', [UserController::class, 'index'])->name('user');

    // Penjualan
    Route::get('/penjualan', [PenjualanController::class, 'index']);
    Route::get('/penjualan/print', [PenjualanController::class, 'print']);
    Route::get('/penjualan/printpdf', [PenjualanController::class, 'printpdf']);
});

Route::group(['middleware' => 'pelanggan'], function () {
    // Pelanggan
    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan');
});
