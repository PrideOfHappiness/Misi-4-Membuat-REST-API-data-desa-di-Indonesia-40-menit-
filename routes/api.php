<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VillagesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/desa', [VillagesController::class, 'index']);
Route::get('/desa/{id}', [VillagesController::class, 'show']);
Route::post('/desa', [VillagesController::class, 'store']);
Route::put('/desa/{id}', [VillagesController::class, 'update']);
Route::delete('/desa/{id}', [VillagesController::class, 'destroy']);