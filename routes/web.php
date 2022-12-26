<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TokenController;
// use Illuminate\Auth\Events\Login;
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

Route::middleware('guest')->group(function(){
    Route::get('/login',[LoginController::class,'index']);
    Route::post('/login',[LoginController::class,'authenticate']);
    // Route::get('/logout',[LoginController::class,'logout']);
    Route::get('/token/{email}' ,[TokenController::class,'index'])->name('token');
    // Route::get('/token')->redirect('/login');
    Route::post('/token',[TokenController::class,'authenticate']);
    Route::get('/tokenlagi',[TokenController::class,'Tokenfail']);
});
Route::get('/logout',[LoginController::class,'logout']);



Route::middleware('tokenLogin')->group(function(){
    Route::resource('/', DashboardController::class);
    Route::resource('/view', JadwalController::class);
    Route::resource('/kelas',KelasController::class);
    Route::resource('/siswa',SiswaController::class);
});

