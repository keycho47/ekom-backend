<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login( Request $request ){
        $login = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($login)){
            return response(['massage' => 'Invalid credentials!']);
        }

        $accessToken = Auth::user()->createToken('authToken')->accessToken;

        return response(['user' => Auth::user(), 'access_token' => $accessToken]);

    }
    public function getAuthUser(){

        if (!Auth::user()){
            return response(['massage' => 'Pls login!']);
        }
        return response(['user' => Auth::user()]);

    }
    public function register (Request $request){
        $validateData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required'
        ]);
        $validateData['password'] = Hash::make($validateData['password']);
        $validateData['is_active'] = true;
        $validateData['is_deleted'] = false;
        $validateData['role_id'] = $request['role_id'];

        $user = User::create($validateData);


        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user' => $user, 'access_token' => $accessToken]);
    }
}
