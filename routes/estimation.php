<?php

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

use App\Http\Controllers\API\EstimationController;
use Illuminate\Support\Facades\Route;

Route::post('/', [EstimationController::class, 'createEstimation'])->middleware('auth:sanctum');
Route::get('/', [EstimationController::class, 'getEstimations'])->middleware('auth:sanctum');
Route::get('/cp', [EstimationController::class, 'getDistinctCP'])->middleware('auth:sanctum');
Route::post('/affect', [EstimationController::class, 'affectAgentToEstimation'])->middleware(['auth:sanctum', 'agency_user']);
