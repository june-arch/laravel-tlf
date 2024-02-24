<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Endpoint for login
Route::post('/auth/login', [AuthController::class, 'login']);
// Endpoint for logout
Route::get('/auth/logout', [AuthController::class, 'logout']);

// Endpoint accessible with authentication
Route::middleware('auth:sanctum')->get('/post/auth/get', [PostController::class, 'getPosts']);

// Endpoint accessible without authentication
Route::get('/post/only/get', [PostController::class, 'getPostsOnly']);
