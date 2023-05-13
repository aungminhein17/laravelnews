<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\PostController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('user/login',[AuthController::class,'login']);
Route::post('user/register',[AuthController::class,'register']);

Route::get('category',[AuthController::class,'categoryList'] )->middleware('auth:sanctum');

Route::get('allPosts',[PostController::class,'allPosts']);
Route::get('allCategory',[PostController::class,'allCategory']);
Route::post('post/search',[PostController::class,'postSearch']);
Route::post('category/search',[PostController::class,'categorySearch']);
Route::post('post/detail',[PostController::class,'postDetail']);
Route::post('post/viewcount',[PostController::class,'viewCount']);


