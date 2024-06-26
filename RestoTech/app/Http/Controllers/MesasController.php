<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mesa;
use Illuminate\Support\Facades\Auth;

class MesasController extends Controller
{
    public function index()
    {
        $mesas = Mesa::all();
        return view('mesas.admin', compact('mesas'));
    }

    public function store(Request $request)
    {
        $mesa = new Mesa();
        $mesa->id = $request->id;
        $mesa->usandose = $request->estado;
        $mesa->numero_asientos = $request->capacidad;
        $mesa->save();
        return redirect()->route('mesas');
    }

    public function list()
    {
        $mesas = Mesa::all();
        return view('mesas.list', compact('mesas'));
    }

    public function updateStatus(Request $request)
    {
        $mesa = Mesa::where('id', $request->id);
        if (Auth::user()->role == 'admin') {
            $mesa->id = $request->id;
            $mesa->usandose = $request->estado;
            $mesa->numero_asientos = $request->capacidad;
            $mesa->save();
            return redirect()->route('mesas');
        }
    }

    public function delete(Request $request)
    {
        $mesa = Mesa::find($request->id);
        $mesa->delete();
        return redirect()->route('mesas');
    }
}
