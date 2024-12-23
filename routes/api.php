<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\VeiculoController;

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

Route::get('/veiculos', [VeiculoController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/entradas', EntradaController::class);
    Route::post('/users', [UserController::class, 'store']);
    Route::post('/veiculos', [VeiculoController::class, 'store']);
    Route::get('/veiculos/{id}', [VeiculoController::class, 'show']);
    Route::put('/veiculos/{id}', [VeiculoController::class, 'update']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
