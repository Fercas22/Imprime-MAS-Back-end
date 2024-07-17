<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::post('auth/register',[AuthController::class, 'create']);
Route::post('auth/login',[AuthController::class, 'login']);

//PARA PODER OCUPAR ESTAS RUTAS HAY QUE ESTAR LOGEADOS
Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('auth/get',[AuthController::class, 'get']);
    Route::get('auth/get/{id}',[AuthController::class, 'getUser']);
    Route::get('auth/logout',[AuthController::class, 'logout']);
    Route::post('auth/update',[AuthController::class, 'update']);
    Route::post('auth/delete',[AuthController::class, 'delete']);
});



