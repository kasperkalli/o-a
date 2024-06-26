<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\userstoreRequest;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function loginview()
    {
        return view('user.login');
    }
    function registerview()
    {
        return view('user.register');
    }

    function login(Request $request)
    {

        $errors = [];
        $credentials = [
            'name' => $request->name,
            'password' => $request->password
        ];

        $remember = $request->check ? true : false;

        if (Auth::attempt($credentials, $remember)) {

            $request->session()->regenerate();

            if (Auth::user()->rol_id == 2) {
                return redirect()->intended('admin');
            } else {
                return redirect()->intended('home');
            }
        } else {
            if (DB::table('users')->where('name', $request->name)->first() == null) {
                $errors['name'] = 'Usuario incorrecto';
            } else {
                $errors['password'] = 'Contraseña incorrecta';
            }

            return back()->withErrors($errors);
        }
    }
    function register(userstoreRequest $request)
    {
        $request->validated();

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->rol_id = 2;
        $user->password = Hash::make($request->password);

        $user->save();

        Auth::login($user);

        return redirect()->intended(route('home'));
    }


    function selfedit()
    {
        $user = Auth::user();
        return view('user.selfedit', compact('user'));
    }

    function selfeditsstore(Request $request)
    {
        $user = User::where('name', Auth::user()->name)->first();
        if ($request->name != $user->name || $request->email != $user->email) {

            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            return redirect()->route('self.edit');
        }
        return back()->withErrors(['name' => 'No se ha modificado ningún campo']);
    }

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('/');
    }
}
