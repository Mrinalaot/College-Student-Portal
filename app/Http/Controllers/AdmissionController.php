<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;
use Storage;
use App\Student_db;
///////////////////////////////
use Illuminate\Support\Facades\Mail;
use App\Mail\MailProfileUpdate;
use App\Mail\MailChangePassword;
////////////////////////////////

class AdmissionController extends Controller
{
    
    public function index(){
    	$user=Auth::user();
        //$admission_profile=DB::table('admission_profiles')->where('user_id','$user->id')->first();
        $handle = fopen("value", "r");
        if ($handle) {
            while(($line = fgets($handle)) !== false) {
                if(strpos($line, "EDIT") !== false)
                    $edit = explode('=', $line)[1];
            }
            fclose($handle);
        }
        return view('admission.home')->with('user',$user)->withEdit($edit);
    	//->with('admission_profile',$admission_profile);
    }

    public function profile(){
    	$user=Auth::user();
    	//$admission_profile=DB::table('admission_profiles')->where('user_id',$user->id)->first();
    	return view('admission.profile')->with('user',$user); 
    }



    public function update_profile(Request $request){
        $user=Auth::user();
        try
        {
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
       return view('admission.change_password')->with('user',$user);
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

    public function form_submit_1(Request $request)
    {
        // $user=Auth::user();
        // echo $request->name;
        // $s = new App\Student_db;
        // $s->name = $request->name ;
        DB::insert('insert into test (id,name) values (?,?)',[1, $request->name]);
        
    }
    public function form_submit_2(Request $request)
    {
        DB::insert('insert into test (id,name) values (?,?)',[2, $request->ssc_school_name]);
        // DB::update('update student_dbs set name=?',[$request->name]);
        // return back();
        
    }
    public function form_submit_3(Request $request)
    {
        //DB::insert('inset into test (x,y) values (?,?)',[1, $request->ssc_school_name]);

        // DB::update('update student_dbs set name=?',[$request->name]);
        // return back();
    }
    public function form_submit_4(Request $request)
    {
        // DB::update('update student_dbs set name=?',[$request->name]);
        // return back();
    }
    public function form_submit_5(Request $request)
    {
        // DB::update('update student_dbs set name=?',[$request->name]);
        // return back();
        DB::insert('insert into test (id,name) values (?,?)',[5, $request->family_income]);
    }



}
