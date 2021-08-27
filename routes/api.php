<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\LawyerController;
use App\Http\Controllers\AnsweringController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ListSkillController;
use App\Http\Controllers\RewardsController;
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

    Route::post('login', [PassportController::class, 'login']);
    Route::post('register', [PassportController::class, 'register']);
    Route::post('loginWithSocial', [PassportController::class, 'loginWithSocial']);

    Route::prefix('user')->group(function(){
        Route::post('', [UserController::class, 'store']);
    });
    
    /* PEOPLE */
    Route::prefix('people')->group(function(){
        Route::get('', [PeopleController::class, 'index']);
        Route::post('', [PeopleController::class, 'store']);
        Route::apiResource('', PeopleController::class, array('as' => 'people'))
                    ->except(['index', 'store'])
                    ->parameters(['' => 'people']);
    });

});

/* PROTECTED */
Route::middleware('auth:api')->group(function(){
    Route::prefix('user')->group(function(){
         Route::get('', [PassportController::class, 'details']);
         Route::post('logout', [PassportController::class, 'logout']);
    });
});
