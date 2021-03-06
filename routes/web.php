<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CollectionController;
use App\Http\Controllers\Admin\DonorController;
use App\Http\Controllers\Admin\SubmissionController;
use App\Http\Controllers\Admin\RittikiController;
use App\Http\Controllers\Admin\CollectorController;
use App\Http\Controllers\Admin\RittikiPayController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
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
Route::get('/', [HomeController::class,'index']);
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('/collection', CollectionController::class);
Route::resource('/donor', DonorController::class);
Route::resource('/submission', SubmissionController::class);
Route::post('/get-donor',[ DonorController::class,'getDonor']);
Route::resource('/rittiki', RittikiController::class);
Route::resource('/rittiki-pay', RittikiPayController::class);
Route::resource('/role', RoleController::class);
Route::resource('/user', UserController::class);
Route::post('/get-role',[ RoleController::class,'getRole']);
Route::post('/get-rittiki',[ RittikiController::class,'getRittiki']);
Route::post('/get-collector',[SubmissionController::class,'getCollector']);
Route::get('/collector-data',[CollectorController::class,'getData']);
Route::get('/own-collection-data',[CollectorController::class,'getData']);
