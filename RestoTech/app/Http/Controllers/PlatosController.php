<?php

namespace App\Http\Controllers;

use App\Models\Platos;

use Illuminate\Http\Request;

class PlatosController extends Controller
{
    public function index()
    {
        $platos = Platos::all();
        return view('platos.admin', compact('platos'));
    }

    public function list()
    {
        $platos = Platos::all();
        return view('platos.list', compact('platos'));
    }

    public function store(Request $request)
    {
        $plato = new Platos();
        $plato->nombre = $request->nombre;
        $plato->precio = $request->precio;
        $plato->categoria_id = $request->categoria;
        $plato->save();
        return redirect()->route('platos');
    }

    public function find(Request $request){
        $plato = Platos::find($request->id);
        return view('platos.edit', compact('plato'));
    }

    public function update(Request $request){
        $plato = Platos::find($request->id);
        $plato->nombre = $request->nombre;
        $plato->precio = $request->precio;
        $plato->categoria_id = $request->categoria;
        $plato->save();
        return redirect()->route('platos');
    }

}
