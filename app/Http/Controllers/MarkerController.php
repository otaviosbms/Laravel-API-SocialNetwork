<?php

namespace App\Http\Controllers;

use App\Models\Marker;
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

}
