<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // comentarios

    public function CriarComentario(Request $request)
    {

        $comentario = new Comment($request->all());

        $comentario->save();
        return response()->json($comentario, 201);
    }


    public function ListarComentariosDoUsuario(int $id)
    {

        $comentarios = User::all();

        return response()->json($comentarios);
    }
}
