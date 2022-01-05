<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index(){
        return response()->json(User::all(), 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function token(Request $request)
    {
        $params = $request->only(['email', 'password']);
        $user = User::where('email', $params['email'])->first();
        $token = $user->createToken(env('APP_KEY'));
        logger($token);
        return response()->json(['user'=>$user, 'token'=>$token->plainTextToken,]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->get();
        if($user === null){
        return response()->json(['message' => '등록된 계정이 없습니다.'], 200, [], JSON_UNESCAPED_UNICODE);
        }
        return response()->json($user, 200, [], JSON_UNESCAPED_UNICODE);
    }

}

