<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HodController extends Controller
{
    //
    public function index(){
    	return view('hod.home');
    }
}
