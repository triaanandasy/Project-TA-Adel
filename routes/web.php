<?php

use App\Http\Controllers\Web\Auth\AuthController;
use App\Http\Controllers\Web\DetailController;
use App\Http\Controllers\Web\KategoriController;
use App\Http\Controllers\Web\PenjualanController;
use App\Http\Controllers\Web\ProdukController;
use App\Models\Kategori_produk;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('produks',ProdukController::class);
Route::resource('kategoris',KategoriController::class);
Route::resource('penjualans', PenjualanController::class);
Route::get('detailpenjualan/{id}',[DetailController::class,'index'])->name('detailpenjualan');

Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');
Route::get('login',[AuthController::class,'loginpage'])->name('login');
Route::post('post-login',[AuthController::class,'login'])->name('login.post');
Route::get('logout',[AuthController::class,'logout'])->name('logout');