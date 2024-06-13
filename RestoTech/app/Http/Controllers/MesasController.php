<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Mesa;

class MesasController extends Controller
{
    public function index()
    {
        return view('mesas.index');
    }

    public function updateStatus(Request $request){
        $mesa = Mesa::find($request->id);
        $mesa->estado = $request->estado;
        $mesa->save();
        return redirect()->route('mesas');
    }

}
