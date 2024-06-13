<?php

namespace App\Http\Controllers;

use App\Models\Plato;

use Illuminate\Http\Request;

class PlatosController extends Controller
{
    public function index()
    {
        $platos = Plato::all();
        return view('platos.index', compact('platos'));
    }

    public function store(Request $request)
    {
        $plato = new Plato();
        $plato->nombre = $request->nombre;
        $plato->precio = $request->precio;
        $plato->categoria_id = $request->categoria;
        $plato->save();
        return redirect()->route('platos');
    }
}
