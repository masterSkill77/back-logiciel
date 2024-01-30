<?php

use App\Enum\Role;
use App\Http\Controllers\API\AgencyController;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\TypeOffertController;
use App\Http\Controllers\API\ClassificationOffertController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\TypeEstateController;
use App\Http\Controllers\API\BienController;
use App\Http\Controllers\API\ClassificationEstateController;
use App\Http\Controllers\API\PigeController;
use App\Http\Controllers\Auth\ConfirmationAccountController;
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

Route::prefix("auth")->group(function () {
    Route::post("register", [RegisterController::class, "register"]);
    Route::post("login", [LoginController::class, "login"]);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix("user")->middleware(["auth:sanctum"])->group(function () {
        Route::post("/create", [UserController::class, "store"]);
        Route::get('/get-agents', [UserController::class, "getAllAgents"]);
    });

    Route::prefix("contact")->middleware(["auth:sanctum"])->group(function () {
        Route::post('/', [ContactController::class, 'store']);
        Route::get('/', [ContactController::class, 'index']);
    });


    // route pour les type offre
    Route::prefix("type-offert")->group(function () {
        Route::get('/', [TypeOffertController::class, 'index']);
        Route::get('/{id}', [TypeOffertController::class, 'findById']);
        Route::get('/classification-offert/{id}', [TypeOffertController::class, 'getClassificationByIdTypeOffert']);
    });

    // route pour les type de bien
    Route::prefix("type-estate")->group(function () {
        Route::get('/', [TypeEstateController::class, 'index']);
        Route::get('/{id}', [TypeEstateController::class, 'getById']);
        Route::get('/classification-bien/{id}', [TypeEstateController::class, 'getClassificationByIdTypeEstate']);
    });

    // route pour les classification de bien
    Route::prefix("classification-estate")->group(function () {
        Route::get('/', [ClassificationEstateController::class, 'index']);
        Route::get('/{id}', [ClassificationEstateController::class, 'getById']);
    });

    // route pour les biens
    Route::prefix("bien")->group(function () {
        Route::post('/', [BienController::class, 'createBien'])->middleware(['auth:sanctum']);
        Route::get('/', [BienController::class, 'findAll'])->middleware(['auth:sanctum']);
        Route::get('/{id}', [BienController::class, 'findById']);
        Route::post('/photos', [BienController::class, 'testPhotos']);
        Route::prefix('agency')->group(function () {
            Route::get('/', [AgencyController::class, 'show'])->middleware(["role:" . (Role::SUPER_ADMIN)->value]);
        });
    });
    Route::prefix('piges')->group(function () {
        Route::get('/{agency}', [PigeController::class, 'getPigesByAgence']);
        Route::get('/details/{pigeId}', [PigeController::class, 'getPige']);
        Route::post('/postal-code', [PigeController::class, 'createPostalCode'])->middleware(["role:" . (Role::SUPER_ADMIN)->value]);
    });
});

Route::get('/validate-account', ConfirmationAccountController::class)->name('validate.account');
