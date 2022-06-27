<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ManagerRegisterController;
use App\Http\Controllers\Auth\ManagerForgotPasswordController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\Auth\WaiterRegisterController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\BookingController;
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

Route::get('/mreg', [App\Http\Controllers\Auth\ManagerRegisterController::class, 'showManagerForm'])->name('mreg');

Route::post('/mreg', [App\Http\Controllers\Auth\ManagerRegisterController::class, 'mreg']);


Route::get('/wreg', [App\Http\Controllers\Auth\WaiterRegisterController::class, 'showRegForm'])->name('wreg');

Route::post('/wreg', [App\Http\Controllers\Auth\WaiterRegisterController::class, 'wreg']);


Route::get('/creg', [App\Http\Controllers\Auth\ChefRegisterController::class, 'showRegForm'])->name('creg');

Route::post('/creg', [App\Http\Controllers\Auth\ChefRegisterController::class, 'chef']);


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




Route::resource('/Ingredient', IngredientController::class);

Route::post('/Ingredient', [App\Http\Controllers\IngredientController::class, 'store']);

Route::get('/Ingredient/create', [App\Http\Controllers\IngredientController::class, 'create'])->name('Ingredient.show');

Route::get('/Ingredient/{Ingredient}', [App\Http\Controllers\IngredientController::class, 'show'])->name('Ingredient.show');

Route::get('/Ingredient/{Ingredient}/edit', [App\Http\Controllers\IngredientController::class, 'edit'])->name('Ingredient.edit'); 

Route::post('/Ingredient/{Ingredient}', [App\Http\Controllers\IngredientController::class, 'update'])->name('Ingredient.update');




Route::resource('/Table', TableController::class);

Route::post('/Table', [App\Http\Controllers\TableController::class, 'store']);


Route::get('/Table/{Table}', [App\Http\Controllers\TableController::class, 'show'])->name('Table.show');

Route::get('/Table/{Table}/edit', [App\Http\Controllers\TableController::class, 'edit'])->name('Table.edit'); 

Route::post('/Table/{Table}', [App\Http\Controllers\TableController::class, 'update'])->name('Table.update');



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





Route::resource('/Booking', BookingController::class);

Route::post('/Booking', [App\Http\Controllers\BookingController::class, 'store']); 

Route::post('/Booking/create', [App\Http\Controllers\BookingController::class, 'create'])->name('Book.create'); 

Route::get('/Booking/{Booking}', [App\Http\Controllers\BookingController::class, 'show'])->name('Book.show');

Route::get('/Booking/{Booking}/edit', [App\Http\Controllers\BookingController::class, 'edit'])->name('Book.edit'); 

Route::post('/Booking/{Booking}', [App\Http\Controllers\BookingController::class, 'update'])->name('Book.update');




Route::prefix('manager')->group(function(){

  Route::get('/login',[App\Http\Controllers\Auth\ManagerLoginController::class, 'showLoginForm'])->name('manager.login');
  Route::post('/login', [App\Http\Controllers\Auth\ManagerLoginController::class, 'login'])->name('manager.login.submit');

  Route::get('/',[App\Http\Controllers\ManagerController::class, 'index'])->name('manager');


  Route::post('/manager/logout', [App\Http\Controllers\Auth\ManagerLoginController::class, 'logout'])->name('manager.logout');


// password 
 Route::post('/password/email', [App\Http\Controllers\Auth\ManagerForgotPasswordController::class, 'sendResetLinkEmail'])->name('manager.password.email');

  Route::get('/password/reset', [App\Http\Controllers\Auth\ManagerForgotPasswordController::class, 'showEmailLinkRequestForm'])->name('manager.password.request');


   Route::get('/password/reset/{token}', [App\Http\Controllers\Auth\ManagerResetPasswordController::class, 'showStuffResetForm'])->name('manager.password.reset');

  Route::post('/password/reset', [App\Http\Controllers\Auth\ManagerResetPasswordController::class, 'reset'])->name('manager.password.update');
});





Route::prefix('waiter')->group(function(){

  Route::get('/login',[App\Http\Controllers\Auth\WaiterLoginController::class, 'showLoginForm'])->name('waiter.login');
  Route::post('/login', [App\Http\Controllers\Auth\WaiterLoginController::class, 'login'])->name('waiter.login.submit');

  Route::get('/',[App\Http\Controllers\WaiterController::class, 'index'])->name('waiter');


  Route::post('/waiter/logout', [App\Http\Controllers\Auth\WaiterLoginController::class, 'logout'])->name('waiter.logout');


// password 
 Route::post('/password/email', [App\Http\Controllers\Auth\WaiterForgotPasswordController::class, 'sendResetLinkEmail'])->name('waiter.password.email');

  Route::get('/password/reset', [App\Http\Controllers\Auth\WaiterForgotPasswordController::class, 'showEmailLinkRequestForm'])->name('waiter.password.request');


   Route::get('/password/reset/{token}', [App\Http\Controllers\Auth\WaiterResetPasswordController::class, 'showStuffResetForm'])->name('waiter.password.reset');

  Route::post('/password/reset', [App\Http\Controllers\Auth\WaiterResetPasswordController::class, 'reset'])->name('waiter.password.update');
});




Route::prefix('chef')->group(function(){

  Route::get('/login',[App\Http\Controllers\Auth\ChefLoginController::class, 'showLoginForm'])->name('chef.login');
  Route::post('/login', [App\Http\Controllers\Auth\ChefLoginController::class, 'login'])->name('chef.login.submit');

  Route::get('/',[App\Http\Controllers\ChefController::class, 'index'])->name('chef');


  Route::post('/chef/logout', [App\Http\Controllers\Auth\ChefLoginController::class, 'logout'])->name('chef.logout');


// password 
 Route::post('/password/email', [App\Http\Controllers\Auth\ChefForgotPasswordController::class, 'sendResetLinkEmail'])->name('chef.password.email');

  Route::get('/password/reset', [App\Http\Controllers\Auth\ChefForgotPasswordController::class, 'showEmailLinkRequestForm'])->name('chef.password.request');


   Route::get('/password/reset/{token}', [App\Http\Controllers\Auth\ChefResetPasswordController::class, 'showStuffResetForm'])->name('chef.password.reset');

  Route::post('/password/reset', [App\Http\Controllers\Auth\ChefResetPasswordController::class, 'reset'])->name('chef.password.update');
});









