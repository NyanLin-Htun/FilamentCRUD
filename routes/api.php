<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\AuthController;

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


Route::middleware('auth:sanctum')->group( function () {
    //post routes avaliable when authenticated
    Route::post('/posts', [PostController::class, 'store']);
    Route::patch('/posts', [PostController::class, 'update']);
    Route::get('/posts/show/{id}', [PostController::class, 'show']);
    Route::delete('/posts/delete', [PostController::class, 'destroy']);

    //category routes available when authenticated
    Route::post('/category', [CategoryController::class, 'store']);
    Route::patch('/category/{id}', [CategoryController::class, 'update']);
    Route::get('/category/show/{id}', [CategoryController::class, 'show']);
    Route::delete('/category/delete', [CategoryController::class, 'destroy']);
});

// category
Route::get('category', [CategoryController::class,'index']);

//Post
Route::get('posts', [PostController::class,'index']);

// authenticate routes
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);