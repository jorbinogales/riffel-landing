<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\LawyerController;
use App\Http\Controllers\AnsweringController;

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
        Route::post('', [QuestionController::class, 'store']);
    });

     /* LAWYER  */

     Route::prefix('lawyer')->group(function(){
        Route::get('', [LawyerController::class, 'index']);
        Route::post('', [LawyerController::class, 'store']);
    });

         /* LAWYER  */

    Route::prefix('answering')->group(function(){
        Route::get('', [AnsweringController::class, 'index']);
        Route::post('', [AnsweringController::class, 'store']);
    });
    

});

