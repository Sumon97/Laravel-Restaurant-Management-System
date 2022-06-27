<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SslCommerzPaymentController;


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



Route::get('/', [App\Http\Controllers\PageController::class, 'front'])->name('front');



Route::post('/Cart', [App\Http\Controllers\CartController::class, 'store'])->middleware('auth');



Auth::routes();



// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::resource('/Order', OrderController::class);

Route::post('/Order', [App\Http\Controllers\OrderController::class, 'store']);

Route::get('/Order/create', [App\Http\Controllers\OrderController::class, 'create'])->name('Order.show');

Route::get('/Order/{Order}', [App\Http\Controllers\OrderController::class, 'show'])->name('Order.show');

Route::get('/Order/{Order}/edit', [App\Http\Controllers\OrderController::class, 'edit'])->name('Order.edit'); 

Route::post('/Order/{Order}', [App\Http\Controllers\OrderController::class, 'update'])->name('Order.update');



Route::resource('/Sale', SaleController::class);

Route::post('/Sale', [App\Http\Controllers\SaleController::class, 'store']);

Route::get('/Sale/create', [App\Http\Controllers\SaleController::class, 'create'])->name('Sale.show');

Route::get('/Sale/{Sale}', [App\Http\Controllers\SaleController::class, 'show'])->name('Sale.show');

Route::get('/Sale/{Sale}/edit', [App\Http\Controllers\SaleController::class, 'edit'])->name('Sale.edit'); 

Route::post('/Sale/{Sale}', [App\Http\Controllers\SaleController::class, 'update'])->name('Sale.update');



Route::resource('/Menu', MenuController::class);

Route::post('/Menu', [App\Http\Controllers\MenuController::class, 'store']); 


Route::get('/Menu/{Menu}', [App\Http\Controllers\MenuController::class, 'show'])->name('Menu.show');

Route::get('/Menu/{Menu}/edit', [App\Http\Controllers\MenuController::class, 'edit'])->name('Menu.edit'); 

Route::post('/Menu/{Menu}', [App\Http\Controllers\MenuController::class, 'update'])->name('Menu.update');



Route::resource('/Food', FoodController::class);

Route::post('/Food', [App\Http\Controllers\FoodController::class, 'store']); 


Route::get('/Food/{Food}', [App\Http\Controllers\FoodController::class, 'show'])->name('Food.show');

Route::get('/Food/{Food}/edit', [App\Http\Controllers\FoodController::class, 'edit'])->name('Food.edit'); 

Route::post('/Food/{Food}', [App\Http\Controllers\FoodController::class, 'update'])->name('Food.update');

















