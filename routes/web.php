<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
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

// Route::get('/home',[HomeController::class,'index'])->name('home')->middleware(['auth','verified']);

Route::group(['prefix' => 'admin','middleware' => ['auth','admin','verified']],function(){
    Route::get('dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::post('/reffer-store',[AdminController::class,'refferAmountStore'])->name('refferamount.store');
    Route::get('/reffer-edit',[AdminController::class,'refferAmountEdit'])->name('refferamount.edit');
    Route::post('/reffer-update',[AdminController::class,'refferAmountUpdate'])->name('refferamount.update');

    Route::get('/reffer/list',[AdminController::class,'refferUsers'])->name('refferUser.list');
});

Route::group(['prefix' => 'user','middleware' => ['auth','user','verified']],function(){
    Route::get('dashboard',[UserController::class,'dashboard'])->name('user.dashboard');
});

