<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    // Likes

    public function DarLike(Request $request)
    {

        $like = new Like($request->all());

        $like->save();
        return response()->json($like, 201);

    }
}
