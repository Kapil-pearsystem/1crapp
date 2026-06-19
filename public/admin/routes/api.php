<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormLeadsController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('/save-leads', [FormLeadsController::class, 'testRequest'])->name('save-leads');
Route::post('api/save-leads', [FormLeadsController::class, 'store'])->name('api.save-leads');
Route::post('/save-leads', [FormLeadsController::class, 'store'])->name('save-leads');

