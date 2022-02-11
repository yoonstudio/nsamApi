<?php

use Faker\Core\Barcode;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PopupController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WelcomeController::class, 'hello']); //초기화면

Route::post('/', [WelcomeController::class, 'login']); //로그인

Route::post('popup', [PopupController::class, 'eqmtpopup']);

Route::get('index', 'WelcomeController@index');

Route::get('ex', function () {
    return view('extend');
});
