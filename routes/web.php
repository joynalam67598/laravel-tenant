<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function(){

    Route::resource('tenants',\App\Http\Controllers\TenantController::class);
    Route::get('set-password',[
        \App\Http\Controllers\SetPasswordController::class,'create'
    ])->name('set-password');
    Route::post('set-password',[
        \App\Http\Controllers\SetPasswordController::class,'store'
    ])->name('set-password.store');

});

Route::get('invitation/{user}',
    [\App\Http\Controllers\TenantController::class,'invitation'])
    ->name('invitation');
