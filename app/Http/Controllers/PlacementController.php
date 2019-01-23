<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class PlacementController extends Controller
{
    //
    public function index(){
    	return view('placement.home');
    }
}
