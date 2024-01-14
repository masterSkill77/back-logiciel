<?php

use App\Enum\Role;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix("auth")->group(function(){
    Route::post("register", [RegisterController::class, "register"]);
    Route::post("login", [LoginController::class, "login"]);
});

Route::prefix("user", ["middleware" => "auth:sanctum", "role"=>Role::SUPER_ADMIN])->group(function(){
    Route::post("/create", [UserController::class, "store"]);

});


Route::prefix("contact")->group(function(){
    Route::get('/' , [ContactController::class, 'index']);
    Route::post('/', [ContactController::class, 'store']);
});
