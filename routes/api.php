<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Blog_commentController;
use App\Http\Controllers\Blog_tagController;
use App\Http\Controllers\Blog_post_tagController;
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
//Categories
Route::get('/categories',[CategoryController::class,'index']);
Route::post('/categories/{id}',[CategoryController::class,'show']);
Route::get('/categories/search/{name}',[CategoryController::class,'search']);


//POSTS
Route::get('/posts',[PostController::class,'index']);
Route::post('/posts/{id}',[PostController::class,'show']);
Route::get('/posts/search/{title}',[PostController::class,'search']);


//blog_comments
Route::get('/comments',[Blog_commentController::class,'index']);
Route::post('/comments/{id}',[Blog_commentController::class,'show']);

//blog tag
Route::get('/tags',[Blog_tagController::class,'index']);
Route::post('/tags/{id}',[Blog_tagController::class,'show']);


//blog post tag
Route::get('/post_tags',[Blog_post_tagController::class,'index']);
Route::post('/post_tags/{id}',[Blog_post_tagController::class,'show']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>'api','prefix'=>'auth'],function($router){
    Route::post('/register',[AuthController::class,'register']);
    
    Route::post('/login',[AuthController::class,'login']);
    Route::post('/logout',[AuthController::class,'logout']);

    //Categories
    Route::post('/categories',[CategoryController::class,'store']);
    Route::put('/categories/{id}',[CategoryController::class,'update']);
    Route::delete('/categories/{id}',[CategoryController::class,'destroy']);


    //posts

    Route::post('/posts',[PostController::class,'store']);
    Route::put('/posts/{id}',[PostController::class,'update']);
    Route::delete('/posts/{id}',[PostController::class,'destroy']);

    //Blog_comment
    Route::post('/comments',[Blog_commentController::class,'store']);
    Route::put('/comments/{id}',[Blog_commentController::class,'update']);
    Route::delete('/comments/{id}',[Blog_commentController::class,'destroy']);

    //blog_tag

    Route::post('/tags',[Blog_tagController::class,'store']);
    Route::put('/tags/{id}',[Blog_tagController::class,'update']);
    Route::delete('/tags/{id}',[Blog_tagController::class,'destroy']);

    //blog_post_tag
    Route::post('/post_tags',[Blog_post_tagController::class,'store']);
    Route::put('/post_tags/{id}',[Blog_post_tagController::class,'update']);
    Route::delete('/post_tags/{id}',[Blog_post_tagController::class,'destroy']);
});


