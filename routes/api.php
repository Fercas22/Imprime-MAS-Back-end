<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientesController;

// Registro de usuarios
Route::post('auth/register', [AuthController::class, 'create']);
// Inicio de sesion
Route::post('auth/login', [AuthController::class, 'login']);

// Para acceder a estas rutas deberas de estar logueado
Route::middleware(['auth:sanctum'])->group(function () {
    // USUARIOS
    //
    // Obtener todos los usuarios
    Route::get('auth/get', [AuthController::class, 'get']);
    // Obtener un usuario mediante su id
    Route::get('auth/get/{id}', [AuthController::class, 'getUser']);
    // Cerrar sesion
    Route::get('auth/logout', [AuthController::class, 'logout']);
    // Actualizar usuario
    Route::post('auth/update', [AuthController::class, 'update']);
    // Eliminar usuario
    Route::post('auth/delete', [AuthController::class, 'delete']);

    // CLIENTES
    //
    //
    Route::get('clientes', [ClientesController::class, 'clientes']);
    Route::post('cliente/create', [ClientesController::class, 'create']);
    Route::get('cliente/{id_cliente}', [ClientesController::class, 'cliente']);
    Route::post('cliente/update', [ClientesController::class, 'update']);
    Route::post('cliente/delete', [ClientesController::class, 'delete']);
});
