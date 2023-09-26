<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    // usuarios
    
    public function CriarUsuario(Request $request)
    {

        $usuario = new User($request->all());
        $usuario->save();
        return response()->json($usuario, 201);

    }

    public function ListarUsuarios()
    {
        $usuarios = User::all();

        return response()->json($usuarios);
    }



    // comentarios

    public function CriarComentario(Request $request, int $id)
    {


        $comentario = new Comment([
            'user_id' => $id,
            'post_id' => $request->post_id,
            'post_user_id' => $request->post_user_id,
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
