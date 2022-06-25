<?php
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\MainController;
use \App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


Route::get('/',[MainController::class, 'home'])->name('home');
Route::get('/contact',[MainController::class, 'contact'])->name('contact');
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login',[UserController::class, 'loginPost']);
Route::get('register',[UserController::class, 'register'])->name('register');
Route::post('/register',[UserController::class, 'registerPost']);
Route::middleware('role:admin')->group(function () {
    Route::get('/admin', [UserController::class, 'account'])->name('admin');
});
Route::middleware('role:user')->group(function () {
    Route::get('/account', [UserController::class, 'account'])->name('account');
});
Route::get('/logout',[UserController::class, 'logout'])->name('logout');
//Route::get('/account',[UserController::class, 'account'])->name('account');
Route::get('/catalog',[ProductController::class, 'catalog'])->name('catalog');
Route::get('/addproduct',[ProductController::class, 'createproduct'])->name('createproduct');
Route::post('/addproduct',[ProductController::class, 'store'])->name('store');
Route::get('/one_product_id={product}',[ProductController::class, 'OneProduct'])->name('product');
Route::post('/destroy_product_{product}',[ProductController::class,'destroy'])->name('destroy');
Route::get('/basket', [OrderController::class, 'basket'])->name('basket');
Route::group(['prefix' => '/order', 'as' => 'order.'], function() {
    Route::get('/cancel/{order}', [OrderController::class, 'cancel'])->name('cancel');
    Route::get('/orders/{myOrder?}', [OrderController::class, 'orders'])->name('all');
});
Route::get('/completed/{order}', [OrderController::class, 'completed'])->name('completed');
Route::post('/basket', [OrderController::class, 'basketPost']);
Route::get('/addBasket', [OrderController::class, 'addBasket'])->name('addBasket');
Route::post('/createOrder', [OrderController::class, 'createOrder'])->name('createOrder');
Route::get('/news',[NewsController::class,'allNews'])->name('news');
