<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\Keranjangontroller;
use App\Http\Controllers\pengajuan_detailController;
use App\Http\Controllers\PengajuanController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/barang', [BarangController::class, 'index']);
Route::post('/barang/store', [BarangController::class, 'store']);
Route::get('/barang/edit/{id}', [BarangController::class, 'edit']);
Route::post('/barang/update/{id}', [BarangController::class, 'update']);
Route::get('/barang/delete/{id}', [BarangController::class, 'delete']);



Route::get('/keranjang', [Keranjangontroller::class, 'index']);
Route::post('/keranjang/store', [Keranjangontroller::class, 'store']);
Route::post('simpan-pengajuan', [Keranjangontroller::class, 'storePengajuan']);
Route::get('/keranjang/detail', [Keranjangontroller::class, 'detail']);

Route::post('/pengajuan/store', [PengajuanController::class, 'store']);


require __DIR__.'/auth.php';
