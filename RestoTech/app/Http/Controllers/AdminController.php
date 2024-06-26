<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\userstoreRequest;
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

    function storeUsers(userstoreRequest $request){
        $request->validated();

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
            // 2 es cliente, 1 es admin
            if ($request->customer == true){
                $user->rol_id = 1; 
            }else{
                $user->rol_id = 2;
            }
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
