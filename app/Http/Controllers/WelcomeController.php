<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function hello(){
        return view('hello');
    }

    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->where('password', $password)->first();
        if ($user) {
            return view('panel')->with('user', $user->remember_token);
        }
        else {
            return '누구쇼?';
        }
    }
}
