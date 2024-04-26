<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminProdukController;

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
    return view('dashboard');
});
Route::get('/landing_page', function () {
    return view('landing_page');
});

// melihatkan halaman dashboard
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
Route::resources(['produk' => ProdukController::class]);
Route::resources(['category' => CategoryController::class]);
Route::resources(['keranjang' => KeranjangController::class]);
Route::resources(['home' => HomeController::class]);
Route::resources(['checkout' => CheckoutController::class]);
Route::resources(['admin_produk' => AdminProdukController::class]);
