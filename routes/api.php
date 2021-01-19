<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

Route::post('/posts/latest', [PostController::class, 'latest']);
Route::post('/posts/paginate', [PostController::class, 'paginate']);
Route::post('/posts/get', [PostController::class, 'post']);
Route::post('/posts/like/{post}', [PostController::class, 'like']);
Route::post('/posts/view/{post}', [PostController::class, 'view']);
Route::post('/posts/comment/{post}', [PostController::class, 'comment']);
