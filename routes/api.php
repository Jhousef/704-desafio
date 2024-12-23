<?php

use App\Http\Controllers\EntradaController;
use App\Http\Controllers\VeiculoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('/veiculos', VeiculoController::class);
Route::apiResource('/entradas', EntradaController::class);

Route::middleware('api')->post('/entradas', [EntradaController::class, 'store']);

// Route::post('/entradas', [EntradaController::class, 'store']);
