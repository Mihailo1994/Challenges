<?php

use App\Http\Controllers\VehicleController;
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

Route::get('/vehicles', [VehicleController::class, 'show']);
Route::get('/vehicles/edit/{id}', [VehicleController::class, 'edit']);

Route::post('/vehicles/create', [VehicleController::class, 'create']);
Route::post('/vehicles/update', [VehicleController::class, 'update']);
Route::post('/vehicles/delete', [VehicleController::class, 'delete']);
