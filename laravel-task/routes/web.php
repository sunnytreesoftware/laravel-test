<?php

use App\Http\Controllers\EmployeeController;
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
    return (new App\Notifications\WelcomeNotification("assas", "email", "sasas"))
                ->toMail('aaa');
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('employee', [EmployeeController::class, 'employee'])->name('employee');
Route::post('employee', [EmployeeController::class, 'addEmployee'])->name('add.employee');
