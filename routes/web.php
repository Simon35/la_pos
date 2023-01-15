<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;

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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

/**
 * Route for users
 */
Route::get('/users-list', [UserController::class, 'index'])->name('users-list');
Route::get('/users-add', [UserController::class, 'create'])->name('users-add');
Route::get('/users-store', [UserController::class, 'store'])->name('users-store');
Route::post('/users-store', [UserController::class, 'store'])->name('users-store');
Route::post('/users-update/{id}', [UserController::class, 'update'])->name('users-update');
Route::post('/users-destroy/{id}', [UserController::class, 'delete'])->name('users-destroy');

/**
 * Route for products
 */
Route::get('/products-list', [ProductController::class, 'index'])->name('products-list');
Route::get('/products-add', [ProductController::class, 'create'])->name('products-add');
Route::post('/products-store', [ProductController::class, 'store'])->name('products-store');
Route::put('/products-update/{id}', [ProductController::class, 'update'])->name('products-update');
Route::post('/products-destroy/{id}', [UserController::class, 'delete'])->name('products-destroy');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/orders', 'OrderController');
//Route::resource('/products', 'ProductController');
Route::resource('/suppliers', 'SupplierController');
//Route::resource('users', 'UserController::class');
Route::resource('/companies', 'CompanyController');
Route::resource('/transactions', 'TransactionController');
