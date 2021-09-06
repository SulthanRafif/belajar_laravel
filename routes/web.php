<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/siswa', function ($nama_siswa = 'Sulthan Rafif') {
//     return view('siswa', ['nama_siswa' => $nama_siswa]);
// });

// Route::get('/siswa/{nama_siswa?}', function ($nama_siswa) {
//     return view('siswa', ['nama_siswa' => $nama_siswa]);
// });

Route::view('/about', 'v_about', [
    'nama' => 'Sulthan Rafif',
    'alamat' => '<h1>Malang, Jawa Timur</h1>'
]);

Route::view('/guru', 'admin.guru.v_dataguru');
Route::view('/contact', 'contact');

// ---------------------------------------------------------

// Route::get('/', function () {
//     return view('v_home');
// });

// Route::view('/guru', 'v_guru');
// Route::view('/siswa', 'v_siswa');
// Route::view('/user', 'v_user');

// ---------------------------------------------------------

Route::get('/', [HomeController::class, 'index']);

Route::get('/guru', [GuruController::class, 'index'])->name('guru');
Route::get('/guru/detail/{id_guru}', [GuruController::class, 'detail']);
Route::get('/guru/add', [GuruController::class, 'add']);
Route::post('/guru/insert', [GuruController::class, 'insert']);
Route::get('/guru/edit/{id_guru}', [GuruController::class, 'edit']);
Route::post('/guru/update/{id_guru}', [GuruController::class, 'update']);
Route::get('/guru/delete/{id_guru}', [GuruController::class, 'delete']);

Route::get('/siswa', [SiswaController::class, 'index']);
Route::view('/user', 'v_user');
Route::get('/home/about/{id}', [HomeController::class, 'about']);
