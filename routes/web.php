<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CollectionController;
use App\Http\Controllers\Admin\DonorController;
use App\Http\Controllers\Admin\RittikiController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('/collection', CollectionController::class);
Route::resource('/donor', DonorController::class);
Route::post('/get-donor',[ DonorController::class,'getDonor']);
Route::resource('/rittiki', RittikiController::class);
Route::post('/get-rittiki',[ RittikiController::class,'getRittiki']);
