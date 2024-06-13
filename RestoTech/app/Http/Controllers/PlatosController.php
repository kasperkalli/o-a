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

    public function find(Request $request){
        $plato = Plato::find($request->id);
        return view('platos.edit', compact('plato'));
    }

    public function update(Request $request){
        $plato = Plato::find($request->id);
        $plato->nombre = $request->nombre;
        $plato->precio = $request->precio;
        $plato->categoria_id = $request->categoria;
        $plato->save();
        return redirect()->route('platos');
    }

}
