<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    // Likes

    public function CriarLike(Request $request)
    {

        $like = new Like($request->all());

        $like->save();
        return response()->json($like, 201);

    }


    public function RemoverLike(int $id)
    {

        $like = Like::find($id);

        if (!$like) {
            return response()->json(['message' => 'Like não encontrado'], 404);
        }

        $like->delete();

        return response()->json(['message' => 'Like removido com sucesso'], 200);
    }

    
    public function ListarLikesDoUsuario(int $id)
    {

        $likes = User::find($id)->likes;

        return response()->json($likes);

    }
}
