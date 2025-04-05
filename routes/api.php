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


//Public API Routes
Route::get("health-check", \App\Http\Controllers\api\HealthCheckController::class);
Route::post("login", [\App\Http\Controllers\api\LoginController::class, "login"]);
Route::get("user-status", [\App\Http\Controllers\api\LoginController::class, "check"]);


//Private Routes
Route::middleware("auth:sanctum")->resource("student", \App\Http\Controllers\api\StudentController::class)->except(["create", "edit"]);
Route::middleware("auth:sanctum")->resource("teacher", \App\Http\Controllers\api\TeacherController::class)->except(["create", "edit"]);
Route::middleware("auth:sanctum")->post("logout", [\App\Http\Controllers\api\LoginController::class, "logout"]);

////For testing purposes
//Route::resource("student", \App\Http\Controllers\api\StudentController::class)->except(["create", "edit"]);
//Route::resource("teacher", \App\Http\Controllers\api\TeacherController::class)->except(["create", "edit"]);
