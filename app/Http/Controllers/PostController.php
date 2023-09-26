<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function CriarPost(Request $request)
    {

        $post = new Post($request->all());
        $post->save();
        return response()->json($post, 201);

    }

    public function ListarPosts()
    {
        $posts = Post::with('comments')->get();

        return response()->json($posts);
    }


}
