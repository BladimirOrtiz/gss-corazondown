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
Route::get('/logout', [App\Http\Controllers\Auth\UserFamily\LogoutController::class,'logout']);

//General Data Register
Route::get('/personaldata', [App\Http\Controllers\Generaldatas\RegisterStudentController::class,'index']);
Route::post('/personaldata', [App\Http\Controllers\Generaldatas\RegisterStudentController::class,'personaldataregister']);
Route::get('/addressstudent', [App\Http\Controllers\Generaldatas\AddressStudentController::class,'index']);
Route::post('/addressstudent', [App\Http\Controllers\Generaldatas\AddressStudentController::class,'registeraddress']);
Route::get('/medicaldata', [App\Http\Controllers\Generaldatas\MedicalStudentController::class,'index']);
Route::post('/medicaldata', [App\Http\Controllers\Generaldatas\MedicalStudentController::class,'savemedicalda']);
Route::get('/generaldata', [App\Http\Controllers\Generaldatas\GeneralDataController::class,'getuserdata']);

//Panel  Family 
Route::get('/welcomepanel', [App\Http\Controllers\BannerFamily\HomeFamilyController::class, 'index'])->name('welcomepanel')
    ->middleware('auth');
    //Clarification Family
    Route::get('/clarificationfamily', [App\Http\Controllers\BannerFamily\ClarificationFamilyController::class, 'index'])->name('clarificationFamily')
    ->middleware('auth');    
    Route::post('/clarificationfamily', [App\Http\Controllers\BannerFamily\ClarificationFamilyController::class, 'clarificatioregister'])->name('clarificatioregister')
    ->middleware('auth');    

    // Read Clarification Family
       Route::get('/readclarification', [App\Http\Controllers\BannerFamily\ReadClarificationController::class, 'index'])->name('readclarificationFamily')
    ->middleware('auth');


    // Kardex Request

    Route::get('/Kardexrequest', [App\Http\Controllers\BannerFamily\KardexRequestController::class, 'showPayRegisters'])->name('kardexrequest')
    ->middleware('auth');    
    Route::post('/Kardexrequest', [App\Http\Controllers\BannerFamily\KardexRequestController::class, 'getPayRegistersByCycle'])->name('cycleschoolkardex')
    ->middleware('auth');   