<?php

use Illuminate\Support\Facades\Route;

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
//User
use App\Http\Controllers\UserController;
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/list', [UserController::class, 'list']);
Route::get('/user/pos', [UserController::class, 'pos']);

//Post
use App\Http\Controllers\PostController;
Route::get('/post', [PostController::class, 'index']);
Route::post('/post/post', [PostController::class, 'post']);
Route::get('/post/edit/{id}',[PostController::class, 'edit']);
//
Route::get('/greeting', function () {   
    return 'Hello World';
}); 

