<?php

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
// Autentification Routes
Route::get('/sesion', [App\Http\Controllers\Auth\UserFamily\LoginUserFamiliController::class,'view']);
Route::post('/sesion', [App\Http\Controllers\Auth\UserFamily\LoginUserFamiliController::class,'signup']);
Route::get('/registrar', [App\Http\Controllers\Auth\UserFamily\RegisterUserFamiliController::class,'showviews']);
Route::post('/registrar', [App\Http\Controllers\Auth\UserFamily\RegisterUserFamiliController::class,'register']);

//General Data Register

Route::get('/personaldata', [App\Http\Controllers\Generaldatas\RegisterStudentController::class,'index']);
Route::post('/personaldata', [App\Http\Controllers\Generaldatas\RegisterStudentController::class,'personaldataregister']);
Route::get('/addressstudent', [App\Http\Controllers\Generaldatas\AddressStudentController::class,'index']);

