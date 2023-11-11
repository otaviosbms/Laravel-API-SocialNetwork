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

//->middleware('auth:sanctum');

// Login:

Route::post('/login', [LoginController::class,'Login'])->name('login');

// Usuários:

Route::post('/users', [UserController::class,'CriarUsuario'])->name('criar.usuario');
Route::delete('/users/{id}', [UserController::class,'ExcluirUsuario'])->name('apagar.usuario');
Route::get('/users', [UserController::class,'BuscaDeUsuarios'])->name('Buscar.usuarios');

// Posts:

Route::post('/posts', [PostController::class,'CriarPost'])->name('criar.post');
Route::get('/posts', [PostController::class,'ListarTodosPosts'])->name('listar.posts');
Route::get('/users/{id}/posts', [PostController::class,'ListarPostsDoUsuario'])->name('listar.postsDoUsuario');
Route::delete('/posts/{id}', [PostController::class,'RemoverPost'])->name('apagar.post');
Route::patch('/posts/{id}', [PostController::class,'AtualizarPost'])->name('atualizar.post');

// comentarios:

Route::post('/comments', [CommentController::class,'CriarComentario'])->name('criar.comantario');
Route::delete('/comments/{id}', [CommentController::class,'RemoverComentario'])->name('apagar.comentario');
Route::get('/users/{id}/comments', [CommentController::class,'ListarComentariosDoUsuario'])->name('listar.comentariosDoUsuario');
Route::patch('/comments/{id}', [CommentController::class,'AtualizarComentario'])->name('atualizar.comentario');

// likes:

Route::post('/likes', [LikeController::class,'CriarLike'])->name('criar.like');
Route::delete('/likes/{id}', [LikeController::class,'RemoverLike'])->name('apagar.like');
Route::get('/users/{id}/likes', [LikeController::class,'listarLikesDoUsuario'])->name('listar.likesDoUsuario');


// Marcadoeres:

Route::post('/markers', [MarkerController::class,'CriarMarcador'])->name('criar.marcador');
Route::delete('/markers/{id}', [MarkerController::class,'RemoverMarcador'])->name('apagar.marcador');
Route::get('/user/{id}/markers', [MarkerController::class,'listarMarcadoresDoUsuario'])->name('listar.marcadoresDoUsuario');