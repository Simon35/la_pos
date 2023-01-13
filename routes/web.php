<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CompanyController;
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

Route::get('/users-list', [UserController::class, 'index'])->name('users-list');
Route::get('/users-add', [UserController::class, 'create'])->name('users-add');
Route::get('/users-store', [UserController::class, 'store'])->name('users-store');
Route::post('/users-store', [UserController::class, 'store'])->name('users-store');
Route::get('/products-list', [ProductController::class, 'index'])->name('products-list');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/orders', 'OrderController');
//Route::resource('/products', 'ProductController');
Route::resource('/suppliers', 'SupplierController');
//Route::resource('users', 'UserController::class');
Route::resource('/companies', 'CompanyController');
Route::resource('/transactions', 'TransactionController');

