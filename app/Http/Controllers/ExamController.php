<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
use Storage;


class ExamController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        return view('exam.home')->with('user', $user);
    }

    public function profile(){
        $user=Auth::user();
        return view('exam.profile')->with('user',$user);
    }
    public function update_profile(Request $request)
    {
        $user=Auth::user();
        $row = new User();
        $row->id=$user->id;
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->save();
        $request->session()->flash('alert-success', 'Profile Updated Successfully!');
        return back();

    }

}
