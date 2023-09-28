<?php

namespace App\Http\Controllers;

use App\Exceptions\UserCreateException;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


    // usuarios

    public function CriarUsuario(Request $request)
    {

        try{
            $usuario = User::create($request->all());
            return response()->json($usuario, 201);
        }catch(UserCreateException $exception){
            return response()->json(["Error" => "não foi possivel criar usuario" ], 201);
        }


    }

    public function ListarUsuarios()
    {
        $usuarios = User::all();

        return response()->json($usuarios);
    }


}
