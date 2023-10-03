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

        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }
    
        $comentarios = $user->comments()->with('post')->get();
    
        return response()->json($comentarios);
    }


    public function AtualizarComentario(Request $request, int $id)
    {

        $comentario = Comment::find($id);
        if (!$comentario) {
            return response()->json(['mensagem' => 'comentario não encontrado'], 404);
        }

        dd($request->toArray());

        $comentario->update($request->toArray());
        

        return response()->json($comentario);

    }

}
