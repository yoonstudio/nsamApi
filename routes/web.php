<?php

use Faker\Core\Barcode;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'WelcomeController@index');

Route::get('test', 'WelcomeController@test');

Route::get('auth/login', function () {
    $credentials = [
        'email' => 'yoonstudio@sk.com',
        'password' => 'skns123$'
    ];

    if(! auth()->attempt($credentials)){
        return '로그인 정보가 없습니다.';
    }

    return redirect('protected');
});

Route::get('protected', function () {
    dump(session()->all());
    if(! auth()->check()){
        return '누구쇼?';
    }
return '반갑습니다. ' .auth()->user()->first_name;
});

// Route::get('protected', [
//     'middleware'=>'auth', function () {
//         dump(session()->all());
//         return '반갑습니다. ' .auth()->user()->first_name;
//     }
// ]);

Route::get('auth/logout', function(){
    auth()->logout();

    return '또 와요~';
});

Route::get('ex', function () {
    return view('extend');
});
