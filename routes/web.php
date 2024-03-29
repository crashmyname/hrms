<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class, 'index'])->name('dashboard');
Route::get('/employee',[EmployeeController::class,'index'])->name('employee');
Route::get('/employeeserverside',[EmployeeController::class,'json'])->name('json_employees');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/bcrypt',[EmployeeController::class, 'bcrypt'])->name('bc');
Route::post('/bcrypt',[EmployeeController::class, 'pbcrypt'])->name('encryption');
