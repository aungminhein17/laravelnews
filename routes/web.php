<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TrendingController;

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

Route::middleware(['admin_auth'])->group(function () {
    Route::get('/', function () {
        return view('face');
    })->name('face');
    Route::get('loginPage', function () {  return view('login');})->name('auth#loginPage');
    Route::get('registerPage', function () {return view('register');})->name('auth#registerPage');
});

Route::middleware(['auth'])->group(function () {
   Route::middleware(['admin_auth'])->group(function(){
    Route::get('/dashboard',[ProfileController::class,'home'])->name('dashboard');
    Route::get('profile',[ProfileController::class,'profile'])->name('profile#profilePage');
    Route::get('list',[ListController::class,'list'])->name('list#listPage');
    Route::get('post',[PostController::class,'posts'])->name('posts#postPage');
    Route::get('trend',[TrendingController::class,'trend'])->name('trend#trendPage');
    Route::get('category',[CategoryController::class,'category'])->name('category#categoryPage');
    Route::get('user/details/{id}',[ListController::class,'userDetails'])->name('user#details');
    Route::get('user/delete/{id}',[ListController::class,'userDelete'])->name('user#delete');

    Route::prefix('category')->group(function(){
        Route::get('createpage',[CategoryController::class,'createPage'])->name('category#createPage');
        Route::get('delete/{id}',[CategoryController::class,'delete'])->name('category#delete');
        Route::get('updatePage/{id}',[CategoryController::class,'updatePage'])->name('category#updatePage');
        Route::post('create',[CategoryController::class,'create'])->name('category#create');
        Route::post('update',[CategoryController::class,'update'])->name('category#update');
    });
    Route::prefix('admin')->group(function(){
        Route::get('editPage',[ProfileController::class,'editPage'])->name('admin#editPage');
        Route::get('change/password',[ProfileController::class,'change'])->name('admin#changepw');
        Route::post('changePassword',[ProfileController::class,'changePassword'])->name('admin##changePassword');
        Route::post('update/{id}',[ProfileController::class,'update'])->name('admin#update');
    });


    Route::prefix('post')->group(function(){
        Route::post('create',[PostController::class,'postPosts'])->name('post#create');
        Route::get('delete/{id}',[PostController::class,'delete'])->name('post#delete');
        Route::get('detail/{id}',[PostController::class,'detail'])->name('post#detail');
        Route::get('edit/{id}',[PostController::class,'edit'])->name('post#edit');
        Route::post('update',[PostController::class,'update'])->name('post#update');
        Route::get('post/trendingPosts/{id}',[TrendingController::class,'trendDetails'])->name('post#trendposts');
    });
   });
});
