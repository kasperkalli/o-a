<?php

namespace App\Http\Controllers;

use App\Models\Platos;
use App\Models\Platos_vendido;
use App\Models\Boleta;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        $platos_escogidos = [];
        return view('platos.list', compact('platos', 'platos_escogidos'));
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
        $plato = Platos::where('id',$request->id);
        if (Auth::user()->role == 'admin'){
            $plato->nombre = $request->nombre;
            $plato->precio = $request->precio;
            $plato->categoria_id = $request->categoria;
            $plato->save();
        }
        return redirect()->route('platos');
    }

    public function delete(Request $request){
        $plato = Platos::find($request->id);
        $plato->delete();
        return redirect()->route('platos');
    }

    function show(Platos $id){
        return view('platos.show', compact('plato'));
    }

    function addchosenPlatos(Request $request){
        //dd($request->input('platos_escogidos', []));
        $platosid = $request->input('platos_escogidos', []);
        //dd(Platos::WhereIn('id', $platosid)->get());
        return view('platos.list', [
            'platos' => Platos::all(),
            'platos_escogidos' => Platos::WhereIn('id', $platosid)->get(),
        ]);
    }

    function chosenPlatosStore(Request $request){
        $platosid = $request->input('platos_escogidos', []);

        $platos_escogidos = Platos::WhereIn('id', $platosid)->get();

        $boleta = new Boleta();
        $boleta->id_usuario = Auth::user()->id;
        $boleta->detalles = 'Compra de platos';

        $boleta->save();

        foreach ($platos_escogidos as $plato){
            $plato_vendido = new Platos_vendido();
            $plato_vendido->id_boleta = $boleta->id;
            $plato_vendido->id_plato = $plato->id;
            $plato_vendido->cantidad = 1;
            $plato_vendido->save();
        }

        return redirect()->route('mesas');
    }

}
