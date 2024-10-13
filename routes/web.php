<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\FlashSaleController;
use App\Http\Controllers\Admin\DistributorController;
use App\Http\Controllers\User\UserController;



// Guest Route
Route::group(['middleware' => 'guest'], function() {
    Route::get('/', function () {
        return view('welcome');
    });
// Register Route
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/post-register', [AuthController::class, 'post_register'])->name('post.register');
    
    Route::post('/post-login', [AuthController::class, 'login']);
})->middleware('guest');

// Admin Route
Route::group(['middleware' => 'admin'], function() {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Product Route
    Route::get('/product', [ProductController::class, 'index'])->name('admin.product');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/admin/product/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('/user/product/detail/{id}', [UserController::class, 'detail_product'])->name('user.detail.product');
    Route::get('/product/purchase/{productId}/{userid}', [UserController::class, 'purchase']);

    // Flash Sale Route
    Route::get('/flashsale', [FlashSaleController::class, 'index'])->name('admin.flash_sale');
    Route::get('/flashsale/create', [FlashSaleController::class, 'create'])->name('flash_sale.create');
    Route::get('/flashsale/edit/{id}', [FlashSaleController::class, 'edit'])->name('flash_sale.edit');
    Route::post('/flashsale/send', [FlashSaleController::class, 'send'])->name('flash_sale.send');
    Route::get('/admin/flashsale/detail/{id}', [FlashSaleController::class, 'detail'])->name('flash_sale.detail');
    Route::post('/flashsale/update/{id}', [FlashSaleController::class, 'update'])->name('flash_sale.update');
    Route::delete('/flashsale/delete/{id}', [FlashSaleController::class, 'delete'])->name('flash_sale.delete');

    // Distributor Route
    Route::get('/distributor', [DistributorController::class, 'index'])->name('admin.distributor');
    Route::get('/distributor/create', [DistributorController::class, 'create'])->name('distributor.create');
    Route::post('/distributor/post', [DistributorController::class, 'post'])->name('distributor.post');
    Route::get('/admin/distributor/detail/{id}', [DistributorController::class, 'detail'])->name('distributor.detail');
    Route::post('/distributor/update/{id}', [DistributorController::class, 'update'])->name('distributor.update');
    Route::delete('/distributor/delete/{id}', [DistributorController::class, 'delete'])->name('distributor.delete');
    Route::get('/distributor/edit/{id}', [DistributorController::class, 'edit'])->name('distributor.edit');

    Route::get('/admin-logout', [AuthController::class, 'admin_logout'])->name('admin.logout');
})->middleware('admin');

// User Route
Route::group(['middleware' => 'web'], function() {
    Route::get('/user', [UserController::class,'index'])->name('user.dashboard');
    Route::get('/user/product/detail/{id}', [UserController::class, 'detail_product'])->name('user.detail.product');
    Route::get('/product/purchase/{productId}/{userId}', [UserController::class, 'purchase']);
    Route::get('/user/flashsale/detailFlash/{id}', [UserController::class, 'detail_flash'])->name('user.detailFlash.flash_sale');
    Route::get('/flashsale/purchaseSale/{flash_saleId}/{userId}', [UserController::class, 'purchaseSale']);


    Route::get('/user-logout', [AuthController::class, 'user_logout'])->name('user.logout');
})->middleware('web');