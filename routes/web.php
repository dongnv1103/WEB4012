<?php
use App\Http\Controllers\UserCotroller;
use App\Http\Controllers\HomeCotroller;
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

Route::get('/', [HomeCotroller::class, 'index'])->name('homepage');
Route::get('products', [HomeCotroller::class, 'product'])->name('product');
Route::get('danh-muc/xoa/{id}', [HomeCotroller::class, 'removeCate'])->name('cate.remove');

// Route::get('users', [UserCotroller::class, 'index']);
// Route::get('thong-tin-ca-nhan', [HomeCotroller::class, 'thongtin']);
// Route::post('show-thong-tin', [HomeCotroller::class, 'showData']);