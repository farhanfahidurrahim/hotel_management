<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user=Auth::user();
            $token=$user->createToken('app')->accessToken;

            return response([
                'message'=>"Successfully Login",
                'token'=>$token,
                'user'=>$user
            ]);
        }

        return response([
            'message'=> "Invalid Email or Password",
        ]); 
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users|email',
            'phone'=>'required',
            'birthday'=>'required',
            'gender'=>'required',
            'prefer'=>'required',
            'password'=>'required|confirmed|min:6',
        ]);

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'birthday'=>$request->birthday,
            'gender'=>$request->gender,
            'prefer'=>$request->prefer,
            'password'=>Hash::make($request->password)
        ]);
        $token=$user->createToken('app')->accessToken;

        return response([
            'message'=>"Registration Successfully",
            'token'=>$token,
            'user'=>$user,
        ]);
    }

    public function user()
    {
        return Auth::user();
    }
}
