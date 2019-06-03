<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Customer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //return $next($request);
        if (Auth::check() && Auth::user()->role == 'customer') {
        return $next($request);
        }
        elseif (Auth::check() && Auth::user()->role == 'agent') {
            return redirect('/agent');
        }
        else {
            return redirect('/admin');
        }
    }
}
