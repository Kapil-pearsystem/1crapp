<?php

use App\Http\Controllers\rms\DashboardController;
use App\Http\Controllers\rms\AuthController as RmsAuthController;
Route::get('rms/login', [RmsAuthController::class, 'index'])->name('rms.login');
Route::post('rms/loggedin', [RmsAuthController::class, 'login'])->name('rms.loggedin');
Route::middleware('tenant')->prefix('rms')->name('rms.')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/rent', [DashboardController::class, 'rent'])->name('rent');
    Route::get('/my-payments', [DashboardController::class, 'my_payments'])->name('my-payments');
    Route::post('/save-rent', [DashboardController::class, 'save_rent'])->name('save-rent');
    Route::get('/logout', [RmsAuthController::class, 'logout'])->name('logout');
   
    
});
