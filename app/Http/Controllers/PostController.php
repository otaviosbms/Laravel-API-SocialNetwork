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

        $posts = Post::all();

        return response()->json($posts);
    }



}
