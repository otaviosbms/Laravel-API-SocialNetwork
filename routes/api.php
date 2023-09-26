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

Route::post('/users', [UserController::class,'CriarUsuario'])->name('user.create');
Route::get('/users', [UserController::class,'ListarUsuarios'])->name('user.list');

// Posts:

Route::post('/posts', [PostController::class,'CriarPost'])->name('post.create');
Route::get('/posts', [PostController::class,'ListarPosts'])->name('post.list');

// comentarios:

Route::post('/users/{id}/comments', [UserController::class,'CriarComentario'])->name('comment.create');
Route::get('/users/{id}/comments', [UserController::class,'ListarComentarios'])->name('user.comments');