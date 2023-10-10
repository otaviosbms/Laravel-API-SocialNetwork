<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\LOginController;
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


// Login:

Route::post('/login', [LoginController::class,'Login'])->name('login');

// Usuários:

Route::post('/users', [UserController::class,'CriarUsuario'])->name('criar.usuario');
Route::delete('/users/{id}', [UserController::class,'ExcluirUsuario'])->name('excluir.usuario');
Route::get('/users', [UserController::class,'BuscaDeUsuarios'])->name('Buscar.usuarios');

// Posts:

Route::post('/posts', [PostController::class,'CriarPost'])->name('criar.post')->middleware('auth:sanctum');
Route::get('/posts', [PostController::class,'ListarTodosPosts'])->name('listar.posts')->middleware('auth:sanctum');
Route::get('/users/{id}/posts', [PostController::class,'ListarPostsDoUsuario'])->name('listar.postsDoUsuario');
Route::patch('/posts/{id}', [PostController::class,'AtualizarPost'])->name('atualizar.post')->middleware('auth:sanctum');

// comentarios:

Route::post('/comments', [CommentController::class,'CriarComentario'])->name('criar.comantario')->middleware('auth:sanctum');
Route::get('/users/{id}/comments', [CommentController::class,'ListarComentariosDoUsuario'])->name('listar.comentariosDoUsuario');
Route::patch('/comments/{id}', [CommentController::class,'AtualizarComentario'])->name('atualizar.comentario')->middleware('auth:sanctum');

// likes:

Route::post('/likes', [LikeController::class,'CriarLike'])->name('criar.like')->middleware('auth:sanctum');
Route::delete('/likes/{id}', [LikeController::class,'RemoverLike'])->name('excluir.like')->middleware('auth:sanctum');
Route::get('/users/{id}/likes', [LikeController::class,'listarLikesDoUsuario'])->name('listar.likesDoUsuario');


// Marcadoeres:

Route::post('/markers', [MarkerController::class,'CriarMarcador'])->name('criar.marcador')->middleware('auth:sanctum');
Route::get('/user/{id}/markers', [MarkerController::class,'listarMarcadoresDoUsuario'])->name('listar.marcadoresDoUsuario');