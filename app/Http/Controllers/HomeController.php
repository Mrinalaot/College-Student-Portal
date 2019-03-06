<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index()
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
            return redirect('/placement');
        }
        elseif (Auth::check() && Auth::user()->role == 'student') {
            return redirect('/student');
        }
        else {
          //return redirect('/home');
          return view('home');
        }
        // return view('home');
    }
}
