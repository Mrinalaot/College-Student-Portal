<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Auth;
use Storage;

///////////////////////////////////////
use Illuminate\Support\Facades\Mail;
use App\Mail\MailProfileUpdate;
use App\Mail\MailChangePassword;
/////////////////////////////////////


class PlacementController extends Controller
{
    //
    public function index(){
    	$user=Auth::user();
    	//$placement_profile=DB::table('placement_profiles')->where('user_id','$user->id')->first();
    	return view('placement.home')->with('user',$user);
    	//->with('placement_profile',$placement_profile);
    }

    public function profile(){
    	$user=Auth::user();
    	//$placement_profile=DB::table('placement_profiles')->where('user_id',$user->id)->first();
    	return view('placement.profile')->with('user',$user); //->with('placement_profile',$placement_profile);
    	//return view('placement.profile',compact('user',$user));
    }



    public function update_profile(Request $request){
        $user=Auth::user();
        try{
    	$user->user_name=$request->user_name;
        $user->email=$request->email;
        if($request->avatar != null)
        {
            $user->avatar = $request->avatar->getClientOriginalName();
            $request->file('avatar')->storeAs('avatars', $user->avatar);
        }
        $user->save();
        $request->session()->flash('alert-success', 'Profile Updated Successfully!');
        Mail::to($user->email)->send(new MailProfileUpdate($user));
    	return back();
          }
       catch(QueryException $e)
       {
          $ec = $e->errorInfo[1];
          if($ec == '1062')
          {
            $request->session()->flash('alert-warning', 'Credential already Exist! Please try again with onother ');
            return back();
          }
       }   
    }

    public function change_password(Request $request)
    {
        $user=Auth::user();
       return view('placement.change_password')->with('user',$user);
    }

    public function change_password__(Request $request)
    {
        $user=Auth::user();
        if(Hash::check($request->old_pass, $user->password))
        {
            $user->password = Hash::make($request->new_pass);
            $user->save();
            $request->session()->flash('alert-success', 'Password Changed Successfully!');
            Mail::to($user->email)->send(new MailChangePassword($user));
            return back();
        }
        else
        {
            $request->session()->flash('alert-warning', 'Please Enter the Old password Correctly!');
            return back();
        }



    }


}

