<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ListarUsuarios()
    {
        $usuarios = User::all();

        return response()->json($usuarios);
    }

    public function store(Request $request)
    {

        $usuario = new User($request->all());
        $usuario->save();
        return response()->json($usuario, 201);

    }

}
