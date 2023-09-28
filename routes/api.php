<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
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

Route::post('/users', [UserController::class,'CriarUsuario'])->name('criar.usuario');
Route::get('/users', [UserController::class,'ListarUsuarios'])->name('listar.usuario');

// Posts:

Route::post('/posts', [PostController::class,'CriarPost'])->name('criar.post');
Route::get('/posts', [PostController::class,'ListarPosts'])->name('listar.post');

// comentarios:

Route::post('/users/comments', [CommentController::class,'CriarComentario'])->name('create.comantario');
Route::get('/users/comments', [CommentController::class,'ListarComentarios'])->name('listar.comentario');

// likes:

