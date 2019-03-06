<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
/////////////////////////////////////////
use App\Mail\SendMailable;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailProfileUpdate;
use App\Mail\MailChangePassword;
use App\Mail\MailAdminAddUser;
////////////////////////////////////////
use Auth;
use Storage;
use App\admin_profile;

class AdminController extends Controller
{
    //
    public function index(){
    	$user=Auth::user();
    	//$admin_profile=DB::table('admin_profiles')->where('user_id','$user->id')->first();
    	return view('admin.home')->with('user',$user);
   
    }

    public function profile(){
        $user=Auth::user();
        
    	return view('admin.profile')->with('user',$user); 
    }

    public function sendmail(){
        $user=Auth::user();
        Mail::to('rupam0915@gmail.com')->send(new SendMailable($user));
        return "<h1>Mail sent</h1>";
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
        //Sending mail
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
       return view('admin.change_password')->with('user',$user);
    }

    public function change_password__(Request $request)
    {
        $user=Auth::user();
        if(Hash::check($request->old_pass, $user->password))
        {
            $user->password = Hash::make($request->new_pass);
            $user->save();
            $request->session()->flash('alert-success', 'Password Changed Successfully!');
            //sending mail
            Mail::to($user->email)->send(new MailChangePassword($user));
            return back();
        }
        else
        {
            $request->session()->flash('alert-warning', 'Please Enter the Old password Correctly!');
            return back();
        }
    }

    public function generate_regcode()
    {
        $user=Auth::user();
        return view('admin.generate_regcode')->with('user',$user);
    }



    public function generate_regcode__(Request $request)
    {
        $user=Auth::user();
     
        $i=0;
        $batches=explode(',',$_POST['form_id']);
        
        $reg = array();
        foreach($batches as $batch)
        {
            $ids = explode('-',$batch);
            $low = $ids[0];
            if(sizeof($ids)>1)
                { $high=$ids[1]; }
            else
                { $high=$ids[0]; }
            
            for($i=$low; $i<=$high; $i++) {
                # code...
                $reg[$i]=substr(strtoupper(md5(strtoupper(strtoupper($i)).'AOT65498546465464uods55klo657ds64f654sd4fsd6fsd'.date('Y'))),-8);
                //DB::insert('insert into form_regs(form_id,reg_code) values (?,?)',[$i,$reg[$i]]);
                DB::insert('insert into form_regs(form_id,reg_code) values (?,?) ON DUPLICATE KEY UPDATE form_id=?, reg_code=?',[$i,$reg[$i],$i,$reg[$i]] ) ;
            }
        }
        return view('admin.show_regcode')->with('user',$user)->with('reg',$reg);
    }
    
    public function  manage_staff(Request $request)
    {
        $user=Auth::user();
        return view('admin.manage_staff')->with('user',$user);
    }

    public function randomstringgenerator($n)  //Rendom Number generator
    { 
    $generated_string = ""; 
    $domain = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"; 
    $len = strlen($domain); 

        for ($i = 0; $i < $n; $i++) 
        { 
            $index = rand(0, $len - 1); 
            $generated_string = $generated_string . $domain[$index]; 
        } 
    return $generated_string; 
    } 

    public function  manage_staff__(Request $request)
    {
        $user=Auth::user();
        $u1 = new user();

        try
        {
        $u1->user_name = $request->user_name;
        $u1->password = bcrypt($request->password);
        $u1->email = $request->email;
        $u1->role = $request->role;
        $u1->form_id = "0"; 
        $u1->reg_code = self::randomstringgenerator('10'); //10 length Random Registraion key generator
        $u1->save();

        $request->session()->flash('alert-success', 'Staff Added successfuly !');
        //sending email to the New User
        Mail::to($request->email)->send(new MailAdminAddUser($u1,$request->password));
        return back();
        }
        catch(QueryException $e)
        {
           $ec = $e->errorInfo[1];
           if($ec == '1062')
           {
            $request->session()->flash('alert-warning', 'Sorry! Credential is already Existing, Choose another UserName/Email and Try Again');
            return back();
           }
        }
    }

    public function  remove_staff(Request $request)
    {
        $user=Auth::user();
        return view('admin.remove_staff')->with('user',$user);
    }

    public function  remove_staff__(Request $request)
    {
        $user=Auth::user();
        $row = User::where('user_name',$request->user_name)->first();
        if($row != null)
        {
            $row->delete();
            $request->session()->flash('alert-success', 'Staff Removed successfuly !');
        }
        else
            $request->session()->flash('alert-warning', 'Sorry! Username not Found. Please enter a valid User Name');
        return back();
    }
}
