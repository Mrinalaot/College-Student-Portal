<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class ExamController extends Controller
{
    //
    public function index(){
    	return view('exam.home');
    }
}
