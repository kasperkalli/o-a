<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    function index(){
        return view('admin.index');
    }
    
    function listUsers(Request $request){
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    function storeUsers(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();
        return redirect()->route('usuarios');
    }


    function editUsers(Request $request){
        $user = User::where('id', $request->id)->first();
        //dd($user);
        return view('admin.edit', compact('user'));
    }

    function editUsersstore(Request $request){
        $user = User::where('id', $request->id)->first();
        if (Auth::user()->role == 'admin' || $user-> id != null){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->rol_id = $request->customer ? 2 : 1; // 2 es cliente, 1 es admin
            $user->save();
        }
        return redirect()->route('usuarios');
    }

    function deleteUsers(Request $request){
        $user = User::where('id', $request->id)->first();
        $user->delete();
        return redirect()->route('usuarios');
    }
}
