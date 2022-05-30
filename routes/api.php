<?php

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

//Route::middleware('auth:sanctum')->get('/user', function () {
//
//});

//Private Routes  Works......
//Route::middleware("auth:sanctum")->resource("student", \App\Http\Controllers\api\StudentController::class)->except(["create", "edit"]);
//Route::middleware("auth:sanctum")->resource("teacher", \App\Http\Controllers\api\TeacherController::class)->except(["create", "edit"]);

//For testing purposes
Route::resource("student", \App\Http\Controllers\api\StudentController::class)->except(["create", "edit"]);
Route::resource("teacher", \App\Http\Controllers\api\TeacherController::class)->except(["create", "edit"]);

//Public API Routes
Route::post("login", [\App\Http\Controllers\api\LoginController::class, "login"]);
Route::post("logout", [\App\Http\Controllers\api\LoginController::class, "logout"]);
Route::get("user-status", [\App\Http\Controllers\api\LoginController::class, "check"]);
