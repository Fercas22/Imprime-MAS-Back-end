<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('auth/register',[AuthController::class, 'create']);
Route::post('auth/login',[AuthController::class, 'login']);
Route::post('auth/info',[AuthController::class, 'update']);
Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('auth/logout',[AuthController::class, 'logout']);
    Route::get('ejemplos2',[AuthController::class, 'ejemplos2']);
});

Route::get('ejemplos',[AuthController::class, 'ejemplos']);


