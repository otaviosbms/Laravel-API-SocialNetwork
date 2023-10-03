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
Route::delete('/users/{id}', [UserController::class,'ExcluirUsuario'])->name('excluir.usuario');
Route::get('/users', [UserController::class,'ListarTodosUsuarios'])->name('listar.usuarios');

// Posts:

Route::post('/posts', [PostController::class,'CriarPost'])->name('criar.post');
Route::get('/posts', [PostController::class,'ListarTodosPosts'])->name('listar.posts');
Route::get('/user/{id}/posts', [PostController::class,'ListarPostsDoUsuario'])->name('listar.postsDoUsuario');
Route::put('/posts/{id}', [PostController::class,'AtualizarPost'])->name('atualizar.post');

// comentarios:

Route::post('/comments', [CommentController::class,'CriarComentario'])->name('criar.comantario');
Route::get('/user/{id}/comments', [CommentController::class,'ListarComentariosDoUsuario'])->name('listar.comentariosDoUsuario');
Route::put('/comments/{id}', [CommentController::class,'AtualizarComentario'])->name('atualizar.comentario');

// likes:

Route::post('/likes', [LikeController::class,'DarLike'])->name('criar.like');
Route::get('/user/{id}/likes', [LikeController::class,'listarLikesDoUsuario'])->name('listar.likesDoUsuario');


// Marcadoeres:

Route::post('/markers', [MarkerController::class,'CriarMarcador'])->name('criar.marcador');
Route::get('/user/{id}/markers', [MarkerController::class,'listarMarcadoresDoUsuario'])->name('listar.marcadoresDoUsuario');