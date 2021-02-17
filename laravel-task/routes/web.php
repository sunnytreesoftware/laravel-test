<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SalesController;
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

Route::get('/', function () {

    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('employee', [EmployeeController::class, 'employee'])->name('employee');
Route::post('employee', [EmployeeController::class, 'addEmployee'])->name('add.employee');

Route::get('product', [ProductsController::class, 'product'])->name('product');
Route::post('product', [ProductsController::class, 'addProduct'])->name('add.product');
Route::post('edit-product', [ProductsController::class, 'editProduct'])->name('edit.product');
Route::post('topup-stock', [ProductsController::class, 'topUpProductStock'])->name('topup.product');

Route::get('customer', [CustomerController::class, 'customer'])->name('customer');
Route::post('customer', [CustomerController::class, 'addCustomer'])->name('add.customer');

Route::get('order', [SalesController::class, 'order'])->name('order');
Route::post('order', [SalesController::class, 'makeOrder'])->name('make.order');
Route::get('make-paid/{order_id}', [SalesController::class, 'makePaid'])->name('make.paid'); 
