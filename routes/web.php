<?php

use App\Http\Controllers\admin\dashboardController as AdminDashboardController;
use App\Http\Controllers\asmin\LoginController as AsminLoginController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {  
    return view('welcome');
});


Route::group(['prefix' => 'account'], function() {

    //guest middleware
    Route::group(['middleware' => 'guest'], function() {
        Route::get('login', [LoginController::class, 'index'])->name('account.login');
        Route::get('register', [LoginController::class, 'register'])->name('account.register');
        Route::post('process-register', [LoginController::class, 'processRegister'])->name('account.processRegister');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');

    });


    //Authenticated middleware
    Route::group(['middleware' => 'auth'], function(){
        Route::get('logout', [LoginController::class, 'logout'])->name('account.logout');
        Route::get('dashboard', [dashboardController::class, 'index'])->name('account.dashboard');

    });

    
});

Route::group(['prefix' => 'admin'], function() {

    Route::group(['middleware' => 'admin.guest'], function() {
        Route::get('login', [AsminLoginController::class, 'index'])->name('admin.login');
        Route::post('authenticate', [AsminLoginController::class, 'authenticate'])->name('admin.authenticate');

    });

    Route::group(['middleware' => 'admin.auth'], function(){
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('logout', [AsminLoginController::class, 'logout'])->name('admin.logout');

    });



});








    