<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MarkerController;
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

Route::post('/comments', [CommentController::class,'CriarComentario'])->name('criar.comantario');
Route::get('/comments', [CommentController::class,'ListarComentarios'])->name('listar.comentario');

// likes:

Route::post('/likes', [LikeController::class,'DarLike'])->name('criar.like');


// Marcadoeres:

Route::post('/markers', [MarkerController::class,'CriarMarcador'])->name('criar.marcador');
