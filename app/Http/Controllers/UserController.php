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

    // * busca de usuarios por filtro + paginação: 


    public function BuscaDeUsuarios(Request $request)
    {

        $query = User::query();
    
        if ($request->has('name')){

            $query->whereName($request->name);
        }
    
        return $query->paginate(5);
    }



    public function CriarUsuario(Request $request)
    {

        try{
            $usuario = User::create($request->all());
            return response()->json($usuario, 201);
        }catch(UserCreateException $exception){
            return response()->json(["Error" => "não foi possivel criar usuario" ], 201);
        }


    }


    public function ExcluirUsuario(int $id)
    {

        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        User::find($id)->delete();

        return response()->json(['message' => 'Usuario excluido com sucesso'], 200);;

    }


}
