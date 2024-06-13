<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function unlogged(){
        return view('home.unlogged');
    }

    function index(){
        return view('home.index');
    }
}
