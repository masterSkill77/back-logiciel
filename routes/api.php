<?php

use App\Enum\Role;
use App\Http\Controllers\API\AgencyController;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\TypeOffertController;
use App\Http\Controllers\API\ClassificationOffertController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\TypeEstateController;
use App\Http\Controllers\API\BienController;
use App\Http\Controllers\API\ChatGPTController;
use App\Http\Controllers\API\ClassificationEstateController;
use App\Http\Controllers\API\FolderController;
use App\Http\Controllers\API\GoogleController;
use App\Http\Controllers\API\PigeController;
use App\Http\Controllers\Auth\ConfirmationAccountController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Services\CommuneSearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        Route::post("/create", [UserController::class, "store"])->middleware(["role:" . (Role::SUPER_ADMIN)->value]);
        Route::post("/update", [UserController::class, "update"])->middleware(["role:" . (Role::SUPER_ADMIN)->value]);
        Route::delete("/delete/{user}", [UserController::class, "destroy"])->middleware(["role:" . (Role::SUPER_ADMIN)->value]);
        Route::get('/get-agents', [UserController::class, "getAllAgents"]);
        Route::get('/check-availability', [UserController::class, "checkAvailability"]);
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
        Route::post('/publish/{id}', [BienController::class, 'udpateStatus'])->middleware(['auth:sanctum']);
        Route::get('/{id}', [BienController::class, 'findById']);
        Route::get('/mandat/{id}', [BienController::class, 'getEstateByMandat']);
        Route::post('/photos', [BienController::class, 'testPhotos']);
        Route::prefix('folder')->group(function () {
            Route::post('/step', [FolderController::class, 'registerStep']);
            Route::patch('/step', [FolderController::class, 'updateStep']);
            Route::get('/step/{action}/{stepId}', [FolderController::class, 'updateOrRemoveStep']);
            Route::post('/register', [FolderController::class, 'registerFolder'])->middleware('agency_user');
        });
    });

    Route::prefix('agency')->group(function () {
        Route::get('/', [AgencyController::class, 'show']);
        // ->middleware(["role:" . (Role::SUPER_ADMIN)->value]);
    });
    Route::prefix('piges')->group(function () {
        Route::get('/', [PigeController::class, 'getPigesByAgence'])->middleware(['auth:sanctum']);
        Route::get('/details/{pigeId}', [PigeController::class, 'getPige']);
        Route::post('/favorie', [PigeController::class, 'createOrRemoveFromFavorie']);
        Route::post('/comment', [PigeController::class, 'createComment']);
        Route::post('/postal-code', [PigeController::class, 'createPostalCode'])->middleware(["role:" . (Role::SUPER_ADMIN)->value]);
        Route::delete('/postal-code/{configuration}', [PigeController::class, 'removePostalCode'])->middleware(["role:" . (Role::SUPER_ADMIN)->value]);
    });
});

Route::prefix('google')->group(function () {
    Route::post('/data', GoogleController::class)->middleware(['auth:sanctum', 'role:' . (Role::SUPER_ADMIN)->value, 'agency_user']);
    Route::post('/create', [GoogleController::class, 'addEvent'])->middleware(['auth:sanctum']);
    Route::get('/oauth2callback', [GoogleController::class, 'callback']);
    Route::get('/synchronize', [GoogleController::class, 'synchronize'])->middleware(['auth:sanctum']);
    Route::delete('/remove/{eventId}', [GoogleController::class, 'removeEvent'])->middleware(['auth:sanctum', 'role:' . (Role::SUPER_ADMIN)->value]);
});

Route::get('/validate-account', ConfirmationAccountController::class)->name('validate.account');

Route::get('/match-address', fn (Request $request) => (new CommuneSearchService)->getStreet($request->query('query')));
Route::get('/match-address-country-global', fn (Request $request) => (new CommuneSearchService)->getCountryName($request->query('name')));

Route::get('/validate-account', ConfirmationAccountController::class)->name('validate.account');

Route::get('/match-address', fn (Request $request) => (new CommuneSearchService)->getStreet($request->query('query')));
Route::get('/match-address-country-global', fn (Request $request) => (new CommuneSearchService)->getCountryName($request->query('name')));
//OpenAI
Route::post('/chat-GPT', [ChatGPTController::class, 'chatGPT']);
