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
Route::post('/addressstudent', [App\Http\Controllers\Generaldatas\AddressStudentController::class,'registerAddress']);
Route::get('/medicaldata', [App\Http\Controllers\Generaldatas\MedicalStudentController::class,'index']);
Route::post('/medicaldata', [App\Http\Controllers\Generaldatas\MedicalStudentController::class,'savemedicalda']);

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

     //PDF
     Route::get('/Kardexpdf', [App\Http\Controllers\PDF\PDFController::class, 'generatePdf'])->name('kardexrequest')
     ->middleware('auth');    
 
 //Administrator Zone

 Route::get('/sesionadmin', [App\Http\Controllers\Admin\Sesion\SinginAdminController::class,'index']);
 Route::post('/sesionadmin', [App\Http\Controllers\Admin\Sesion\SinginAdminController::class,'signupadmin']);

 // Admin Panel 
Route::get('/adminepanel', [App\Http\Controllers\Admin\Banner\AdminPanelController::class, 'index'])->name('admin.panel')
    ->middleware('auth');
    // Listado de Padres de Familia
       Route::get('/studentlist', [App\Http\Controllers\Admin\Banner\DataStudentListController::class, 'index'])->name('admin.studentlist')
    ->middleware('auth');
    //Dashboard de Pagos
    Route::get('/payregister/{id_user}', [App\Http\Controllers\Admin\Banner\DashboardPayRegisterController::class, 'show'])->name('payregister.show')
    ->middleware('auth');
   // CRUD
    // Registro de Pago
    Route::get('/payregister/create/{id_user}', [App\Http\Controllers\Admin\Banner\DashboardPayRegisterController::class, 'showcreate'])->name('payregister.create')
    ->middleware('auth');
    Route::post('/payregister/create/{id_user}', [App\Http\Controllers\Admin\Banner\DashboardPayRegisterController::class, 'payregister'])->name('payregister.store')
    ->middleware('auth');

    // Update   
    Route::middleware(['auth'])->group(function () {
        Route::get('/payregister/{id_user}/{id_register}/edit', [App\Http\Controllers\Admin\Banner\DashboardPayRegisterController::class, 'edit'])->name('payregister.edit');
        Route::put('/payregister/{id_user}/{id_register}', [App\Http\Controllers\Admin\Banner\DashboardPayRegisterController::class, 'update'])->name('payregister.update');
        Route::delete('/payregister/{id_user}/{id_register}', [App\Http\Controllers\Admin\Banner\DashboardPayRegisterController::class, 'destroy'])->name('payregister.destroy');
    });
    

    //anwers clarification zone
    Route::get('/dataclarification', [App\Http\Controllers\Admin\Banner\ClarificationDataController::class, 'index'])->name('admin.dataclarification') ->middleware('auth');
    //Anwer Create
    Route::get('/create-answer/{id_user}/{id_clarification}', [App\Http\Controllers\Admin\Banner\ClarificationDataController::class, 'showCreate'])->name('answers.create') ->middleware('auth');
    Route::post('/store-answer/{id_user}/{id_clarification}', [App\Http\Controllers\Admin\Banner\ClarificationDataController::class, 'store'])->name('answers.store') ->middleware('auth');
    Route::get('/answers_clarifications/{id_user}', [App\Http\Controllers\Admin\Banner\ClarificationDataController::class, 'showanwerslist'])->name('answers_clarifications.show');

