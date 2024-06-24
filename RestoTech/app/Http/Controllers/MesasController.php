<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Mesa;

class MesasController extends Controller
{
    public function index()
    {
        $mesas = Mesa::all();
        return view('mesas.admin', compact('mesas'));
    }

    public function list()
    {
        $mesas = Mesa::all();
        return view('mesas.list', compact('mesas'));
    }

    public function updateStatus(Request $request){
        $mesa = Mesa::find($request->id);
        $mesa->estado = $request->estado;
        $mesa->save();
        return redirect()->route('mesas');
    }

}
