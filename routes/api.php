<?php

use App\Http\Controllers\AlamatController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\FotoProdukController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\MetodePembayaranController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\WishlistController;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('user', [AuthController::class, 'user']);
Route::post('update-profile',[AuthController::class,'updateprofile']);
Route::post('update-dataprofile',[AuthController::class,'updateUserData']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('detail_penjualan')->group(function(){
    Route::get('/',[DetailPenjualanController::class,'index']);
    Route::post('create',[DetailPenjualanController::class,'store']);
});

Route::prefix('alamat')->group(function(){
    Route::get('/',[AlamatController::class,'index']);
    Route::post('create',[AlamatController::class,'store']);

});
Route::prefix('foto_produk')->group(function(){
    Route::get('/',[FotoProdukController::class,'index']);
    Route::post('create',[FotoProdukController::class,'store']);
});

Route::prefix('kategori_produk')->group(function(){
    Route::get('/',[KategoriProdukController::class,'index']);
    Route::post('create',[KategoriProdukController::class,'store']);
});
Route::prefix('keranjang')->group(function(){
    Route::get('/',[KeranjangController::class,'index']);
    Route::post('create',[KeranjangController::class,'store']);
});

Route::prefix('metode_pembayaran')->group(function(){
    Route::get('/',[MetodePembayaranController::class,'index']);
    Route::post('create',[MetodePembayaranController::class,'store']);
});

Route::prefix('pelanggan')->group(function(){
    Route::get('/',[PelangganController::class,'index']);
    Route::post('create',[PelangganController::class,'store']);
});

Route::prefix('penjualan')->group(function(){
    Route::get('/',[PenjualanController::class,'index']);
    Route::post('create',[PenjualanController::class,'store']);
    Route::post('create_keranjang',[PenjualanController::class,'create_keranjang']);
});

Route::prefix('produk')->group(function(){
    Route::get('/',[ProdukController::class,'index']);
    Route::post('create',[ProdukController::class,'store']);
});

Route::prefix('rating')->group(function(){
    Route::get('/',[RatingController::class,'index']);
    Route::post('create',[RatingController::class,'store']);
});

Route::get('penjualan-dipesan',[PenjualanController::class,'getpenjualandipesan']);
Route::get('penjualan-dikirim',[PenjualanController::class,'getpenjualandikirim']);
Route::get('penjualan-diterima',[PenjualanController::class,'getpenjualanditerima']);

Route::get('produk-rincianpesanan',[PenjualanController::class,'getprodukrincianpesanan']);

Route::prefix('wishlist')->group(function(){
    Route::get('/',[WishlistController::class,'index']);
    Route::post('create',[WishlistController::class,'store']);
});
