<?php

use App\Http\Controllers\rms\DashboardController;
use App\Http\Controllers\rms\AuthController as RmsAuthController;
Route::get('rms/', [RmsAuthController::class, 'index'])->name('rms');
Route::get('rms/login', [RmsAuthController::class, 'index'])->name('rms.login');
Route::post('rms/loggedin', [RmsAuthController::class, 'login'])->name('rms.loggedin');
Route::middleware('tenant')->prefix('rms')->name('rms.')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [DashboardController::class, 'updateProfile'])->name('profile.update');
    Route::get('/pin', [DashboardController::class, 'change_pin'])->name('pin');
    Route::put('/pin/update', [DashboardController::class, 'updatePin'])->name('pin.update');
    Route::get('/my-property', [DashboardController::class, 'my_property'])->name('my-property');
    Route::get('/my-payments', [DashboardController::class, 'my_payments'])->name('my-payments');
    Route::post('/save-rent', [DashboardController::class, 'save_rent'])->name('save-rent');
    Route::get('/my-payments/{id}/history', [DashboardController::class, 'payment_history'])->name('payment-history');
    Route::get('/logout', [RmsAuthController::class, 'logout'])->name('logout');
   
    
});
