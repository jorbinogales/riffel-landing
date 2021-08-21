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
|
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

    /* QUESTION */

    Route::prefix('question')->group(function(){
        Route::get('', [QuestionController::class, 'index']);
        Route::post('', [QuestionController::class, 'store']);
        Route::get('count',[QuestionController::class, 'count']);
        Route::get('last', [QuestionController::class, 'last']);
    });

     /* LAWYER  */

     Route::prefix('lawyer')->group(function(){
        Route::get('', [LawyerController::class, 'index']);
        Route::post('', [LawyerController::class, 'store']);
        Route::apiResource('', LawyerController::class, array('as' => 'lawyer'))
                    ->except(['index', 'store'])
                    ->parameters(['' => 'lawyer']);
    });

     /* LAWYER  */

    Route::prefix('answering')->group(function(){
        Route::get('', [AnsweringController::class, 'index']);
        Route::post('', [AnsweringController::class, 'store']);
    });

    /* Search  */

    Route::prefix('search')->group(function(){
        Route::get('', [SearchController::class, 'index']);
        Route::post('', [SearchController::class, 'store']);
    });

    /* Skill  */

    Route::prefix('skill')->group(function(){
        Route::get('', [SkillController::class, 'index']);
        Route::post('', [SkillController::class, 'store']);
    });

    /* ListSkill  */

    Route::prefix('listskill')->group(function(){
        Route::get('', [ListSkillController::class, 'index']);
    });
    
    /* Rewards  */

    Route::prefix('rewards')->group(function(){
        Route::post('create', [RewardsController::class, 'store']);
    });

});

/* PROTECTED */
Route::middleware('auth:api')->group(function(){
    Route::prefix('user')->group(function(){
         Route::get('', [PassportController::class, 'details']);
         Route::post('logout', [PassportController::class, 'logout']);
    });
});
