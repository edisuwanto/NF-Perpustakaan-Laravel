<?php

use Illuminate\Support\Facades\Route;

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
// ini tambahan saya pak
Route::get('/hello', function () {
    return view('halo');
});

// rooting pengarang
Route::resource(
    'pengarang',
    'PengarangController'
);

Route::resource(
    'penerbit',
    'PenerbitController'
);

Route::resource(
    'anggota',
    'AnggotaController'
);

Route::resource(
    'buku',
    'BukuController'
);

Route::resource(
    'kategori',
    'KategoriController'
);

Route::resource(
    'peminjaman',
    'PeminjamanController'
);