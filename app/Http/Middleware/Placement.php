<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Placement
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
        if (Auth::check() && Auth::user()->role == 'admin') {
            return redirect('/admin');
        }
        elseif (Auth::check() && Auth::user()->role == 'admission') {
            return redirect('/admission');
        }
        elseif (Auth::check() && Auth::user()->role == 'exam') {
            return redirect('/exam');
        }
        elseif (Auth::check() && Auth::user()->role == 'placement') {
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->role == 'student') {
            return redirect('/student');
        }
        else {
            return redirect('/home');
        }
    }
}
