<?php

namespace App\Http\Controllers;

use App\Models\Marker;
use App\Models\User;
use Illuminate\Http\Request;

class MarkerController extends Controller
{
    // Marcadores

    public function CriarMarcador(Request $request)
    {

        $marcador = new Marker($request->all());

        $marcador->save();
        return response()->json($marcador, 201);

    }

    
    public function ListarMarcadoresDoUsuario(int $id)
    {

        $marcadores = User::find($id)->markers;

        return response()->json($marcadores);

    }

    public function RemoverMarcador(int $id)
    {

        $marcador = Marker::find($id);

        if (!$marcador) {
            return response()->json(['message' => 'marcador não encontrado'], 404);
        }

        $marcador->delete();

        return response()->json(['message' => 'marcador removido com sucesso'], 200);
    }

}
