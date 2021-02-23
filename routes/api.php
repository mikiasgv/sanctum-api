<?php

use App\Http\Controllers\Api\AlertController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CheckpointController;
use App\Http\Controllers\Api\CventController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/token', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::resource('events', CventController::class);
    Route::resource('checkpoints', CheckpointController::class)->except(['index', 'show']);
    Route::resource('alerts', AlertController::class)->except(['index', 'show']);

    Route::delete('/token', [AuthController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
