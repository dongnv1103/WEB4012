<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\DB;

Route::prefix('san-pham')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('xoa/{id}', [ProductController::class, 'remove'])->name('product.remove');
    Route::get('tao-moi', [ProductController::class, 'addForm'])->name('product.add');
    Route::post('tao-moi', [ProductController::class, 'saveAdd']);
    Route::get('cap-nhat/{id}', [ProductController::class, 'editForm'])->name('product.edit');
    Route::post('cap-nhat/{id}', [ProductController::class, 'saveEdit']);
});

Route::prefix('danh-muc')->group(function () {
    Route::get('detail/{id}', [CategoryController::class, 'detail'])->name('category.detail');
    Route::get('/', [CategoryController::class, 'index'])->name('cate.index');
});

Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('xoa/{id}', [UserController::class, 'remove'])->name('user.remove');
    Route::get('tao-moi', [UserController::class, 'addForm'])->name('user.add');
    Route::post('tao-moi', [UserController::class, 'saveAdd']);
    Route::get('cap-nhat/{id}', [UserController::class, 'editForm'])->name('user.edit');
    Route::post('cap-nhat/{id}', [UserController::class, 'saveEdit']);
});

Route::prefix('room')->group(function () {
    Route::get('/', [RoomController::class, 'index'])->name('room.index');
    Route::get('xoa/{id}', [RoomController::class, 'remove'])->name('room.remove');
    Route::get('tao-moi', [RoomController::class, 'addForm'])->name('room.add');
    Route::post('tao-moi', [RoomController::class, 'saveAdd']);
    Route::get('cap-nhat/{id}', [RoomController::class, 'editForm'])->name('room.edit');
    Route::post('cap-nhat/{id}', [RoomController::class, 'saveEdit']);
});

Route::prefix('service')->group(function () {
    Route::get('/', [ServiceController::class, 'index'])->name('service.index');
    Route::get('xoa/{id}', [ServiceController::class, 'remove'])->name('service.remove');
    Route::get('tao-moi', [ServiceController::class, 'addForm'])->name('service.add');
    Route::post('tao-moi', [ServiceController::class, 'saveAdd']);
    Route::get('cap-nhat/{id}', [ServiceController::class, 'editForm'])->name('service.edit');
    Route::post('cap-nhat/{id}', [ServiceController::class, 'saveEdit']);
});

?>