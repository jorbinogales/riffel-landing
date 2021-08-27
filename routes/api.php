<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PassportController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
*/

/* PUBLIC */
Route::middleware('api')->group(function () { 

    /* PEOPLE */
    Route::post('login', [PassportController::class, 'login']);

    Route::prefix('people')->group(function(){
        Route::get('', [PeopleController::class, 'index']);
        Route::post('create', [PeopleController::class, 'store']);
    });

});

/* PROTECTED */
Route::middleware('auth:api')->group(function(){
    Route::prefix('user')->group(function(){
         Route::get('', [PassportController::class, 'details']);
         Route::post('logout', [PassportController::class, 'logout']);
    });
});
