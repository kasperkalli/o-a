<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            //admin middleware
            if(Auth::user()->rol_id == 1){
                return redirect()->route('/'); // Redirect to the login route
            }
            //user middleware
            return redirect()->route('');
        }

        return $next($request);
    }
}

