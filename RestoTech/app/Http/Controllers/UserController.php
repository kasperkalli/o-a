<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    function loginview(){
        return view('user.login');
    }
    function registerview(){
        return view('user.register');
    }

    function login(Request $request){

        $errors = [];
        $credentials = [
            'name' => $request->name,
            'password' => $request->password
        ];

        $remember = $request->chek ? true : false;
        
        if(Auth::attempt($credentials, $remember)){

            $request->session()->regenerate();

            if (Auth::user()->rol_id == 2) {
                return redirect()->intended('admin');

            }else{
                return redirect()->intended('home');
            }
        }else{
            if(DB::table('users')->where('name', $request->name)->first() == null){
                $errors['name'] = 'Usuario incorrecto';
            }else{
                $errors['password'] = 'Contraseña incorrecta';
            }

            return back()->withErrors($errors);

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
