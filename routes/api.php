<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

// Usuários:

Route::get('/users', [UserController::class,'ListarUsuarios'])->name('user.list');
Route::post('/users', [UserController::class,'store'])->name('user.create');

// Posts:

Route::get('/posts', [PostController::class,'ListarPosts'])->name('post.list');
Route::post('/posts', [PostController::class,'store'])->name('post.create');