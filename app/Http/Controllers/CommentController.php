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

        $comentario = new Comment([
            'user_id' => $request->id,
            'post_id' => $request->post_id,
            'content' => $request->content
        ]);

        $comentario->save();
        return response()->json($comentario, 201);
    }


    public function ListarComentarios(int $id)
    {

        $comentarios = User::find($id)->comments;

        return response()->json($comentarios);
    }
}
