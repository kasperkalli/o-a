<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function loginview(){
        return view('user.login');
    }
    function registerview(){
        return view('user.register');
    }

    function login(Request $request){


        $credentials = [
            'name' => $request->name,
            'password' => $request->password
        ];

        $remember = $request->chek ? true : false;

        if(Auth::attempt($credentials, $remember)){

            $request->session()->regenerate();

            if (Auth::user()->role == 'Admin') {
                return redirect()->route('admin');

            }else{
                return redirect()->route('home');
            }
        }else{
            return back()->withErrors([
                'failed' => 'Usuario o contraseña incorrectos.']);

        }
    }
    function register(Request $request){
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        Auth::login($user);

        return redirect()->intended(route('home'));
    }

    function validate(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('/');
    }
}
