<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws ValidationException
     */
    public function login(Request $request){

        $credentials = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"]
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return response(["message" => "OK"]);
        }else{
            throw ValidationException::withMessages(["message" => "Data is invalid"]);
        }
    }

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response(["message: OK"]);
    }

    public function check(){
        return Auth::check() ? response([Auth::user()], 200): response([""], 401);
    }
}
