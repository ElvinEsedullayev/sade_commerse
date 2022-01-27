<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;

// front login alvinnnn162@gmail.com   password 123456789
// back login admin@gmail.com   password 123456789

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/redirect',[HomeController::class,'redirect'])->name('redirect');
Route::get('/',[HomeController::class,'index']);
Route::get('/product',[AdminController::class,'store'])->name('admin.product.store');
Route::post('/product/add',[AdminController::class,'create'])->name('admin.product.create');
Route::get('/productshow',[AdminController::class,'index'])->name('admin.product.index');
Route::get('/product/delete/{id}',[AdminController::class,'delete'])->name('admin.product.delete');
Route::get('/product/update/{id}',[AdminController::class,'edit'])->name('admin.product.edit');
Route::post('/product/update/{id}',[AdminController::class,'update'])->name('admin.product.update');
Route::get('/ordershow',[AdminController::class,'order'])->name('admin.order.index');
Route::get('/order/update/{id}',[AdminController::class,'orderupdate'])->name('admin.order.update');

Route::post('/search',[HomeController::class,'search'])->name('search');

Route::post('/add/cart/{id}',[HomeController::class,'addCart'])->name('add.cart');
Route::get('/showcart',[HomeController::class,'showCart'])->name('show.cart');
Route::get('/cart/delete/{id}',[HomeController::class,'cartDelete'])->name('cart.delete');
Route::post('/order',[HomeController::class,'orderConfirm'])->name('order.confirm');
