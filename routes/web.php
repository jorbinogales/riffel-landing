<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\PeopleController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* excel */
Route::prefix('excel')->group(function(){
    Route::get('export', [PeopleController::class, 'fileExport']);
});

/* image */
Route::prefix('image')->group(function(){
    Route::get('lawyers/{filename}', function ($filename){
        $file = Storage::disk('local')->get('public/lawyers/'.$filename);
        return response($file, 200)->header('Content-Type', 'image/jpeg');
    });

});

Auth::routes();
