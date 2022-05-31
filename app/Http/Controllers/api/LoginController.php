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
            throw ValidationException::withMessages(["You are not worthy"]);
        }
    }

    public function logout(Request $request){

        //Logout route doesn't need sanctum middleware. It can be public route.
        //In that case Auth::logout() would have worked.
        //However, this route is chosen to be using sanctum, thus Auth::guard('web')->logout() is used.
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response([]);
    }

    public function check(){
        return Auth::check() ? response([Auth::user()], 200): response([""], 401);
    }
}