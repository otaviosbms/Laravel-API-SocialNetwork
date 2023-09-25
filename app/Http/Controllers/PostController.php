<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function ListarPosts()
    {
        $posts = Post::all();

        return response()->json($posts);
    }

    public function store(Request $request)
    {

        $post = new Post($request->all());
        $post->save();
        return response()->json($post, 201);

    }
}
