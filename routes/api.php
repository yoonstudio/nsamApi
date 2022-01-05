<?php

use App\Http\Controllers\Api\EquipmentsController;
use App\Http\Controllers\Api\UserInfoController;
use App\Http\Controllers\Api\UsersController;
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

Route::get('/user', [UsersController::class, 'index']);
Route::get('/user/{id}', [UsersController::class, 'show']);
Route::post('/sanctum', [UsersController::class, 'token']);

Route::middleware('auth:sanctum')->group(function(){
    // Route::get('/equipments', [EquipmentsController::class, 'index']);
    Route::get('/equipments/{id}', [EquipmentsController::class, 'show']);

    // Route::get('/userinfo', [UserInfoController::class, 'index']);
    Route::get('/userinfo/{id}', [UserInfoController::class, 'show']);
});


