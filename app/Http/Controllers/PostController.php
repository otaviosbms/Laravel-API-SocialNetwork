<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    // posts

    public function CriarPost(Request $request)
    {

        $post = new Post($request->all());
        $post->save();
        return response()->json($post, 201);

    }


    public function ListarTodosPosts()
    {

        $posts = Post::with('comments')->get();

        return response()->json($posts);
    }


    public function ListarPostsDoUsuario(int $id)
    {

        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }
    
        $posts = $user->posts()->with('comments')->get();
    
        return response()->json($posts);
    }


    public function AtualizarPost(Request $request, int $id)
    {

        $post = Post::find($id);
        if (!$post) {
            return response()->json(['mensagem' => 'post não encontrado'], 404);
        }

        $post->update($request->toArray());

        return response()->json($post);

    }

    public function RemoverPost(int $id)
    {

        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'post não encontrado'], 404);
        }

        $post->delete();

        return response()->json(['message' => 'post removido com sucesso'], 200);
    }

}
