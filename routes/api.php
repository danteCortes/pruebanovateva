<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'user'], function(){
    Route::get('', [UserController::class, 'index']);
    Route::post('', [UserController::class, 'save']);
    Route::get('/category', [UserController::class, 'inCategory']);
    Route::get('/posts/{user_id}', [UserController::class, 'allPosts']);
});
Route::group(['prefix' => 'post'], function(){
    Route::get('', [PostController::class, 'index']);
    Route::post('', [PostController::class, 'save']);
    Route::get('/category', [PostController::class, 'getByCategory']);
});
Route::group(['prefix' => 'category'], function(){
    Route::get('', [CategoryController::class, 'index']);
    Route::post('', [CategoryController::class, 'save']);
});