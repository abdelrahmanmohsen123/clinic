<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\DoctorassessmentController;

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

Auth::routes();

 Route::group(
    [

    ],
    function () {        
        // Dashboard backend
        Route::group(['middleware' => 'auth'], function () {
            
            // Dashboard backend
            Route::get('/', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard.index');
            
            Route::resource('dashboard/patient', PatientController::class);
            Route::resource('dashboard/schedule', ScheduleController::class);
            Route::resource('dashboard/procedure', ProcedureController::class);
            Route::resource('dashboard/assessment', DoctorassessmentController::class);
            Route::resource('dashboard/visit', VisitController::class);
            Route::resource('dashboard/bill', BillController::class);

        });
});

