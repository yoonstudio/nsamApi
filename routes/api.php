<?php

use App\Http\Controllers\Api\EquipmentsController;
use App\Http\Controllers\Api\EquipmentMoveController;
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

//API 계정관리
Route::get('/user', [UsersController::class, 'index']); //API 연동계정 조회
Route::get('/user/{id}', [UsersController::class, 'show']);
// Route::post('/user', [UsersController::class, 'store']); //API 신규계정 생성
Route::post('/usertoken', [UsersController::class, 'userTokenCreate']); //API 연동계정 & TOKEN 생성
Route::put('/usertoken', [UsersController::class, 'tokenCreate']); //API TOKEN 수정

//자산관리
Route::middleware('auth:sanctum')->group(function(){
    // Route::get('/equipments', [EquipmentsController::class, 'index']);
    Route::get('/equipments/{id}', [EquipmentsController::class, 'show']); //유저별 자산 조회(param: 사번)

    // Route::get('/userinfo', [UserInfoController::class, 'index']);
    Route::get('/userinfo/{id}', [UserInfoController::class, 'show']); //조직별 유저 조회(param: 조직코드)

    Route::get('/equipmentmove', [EquipmentMoveController::class, 'index']); //자산이동 현황
    Route::get('/equipmentmove/{id}', [EquipmentMoveController::class, 'show']); //유저별 자산이동요청 조회(param: 사번)
    Route::post('/equipmentmove', [EquipmentMoveController::class, 'store']); //자산이동 신청(param: id, req사번, res사번, req_dt, req_comment)
    Route::put('/equipmentmove/{id}', [EquipmentMoveController::class, 'update']); //자산이동 승인(param: id, res사번, res_dt, res_comment, mov_ststus)
});


