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

    function editUsers(Request $request, User $user){
        if (Auth::user()->role == 'admin' & $user->name != Auth::user()->name){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->save();
        }
        return redirect()->route('usuarios');
    }

    function deleteUsers(User $id){
        $id->delete();
        return redirect()->route('usuarios');
    }
}
