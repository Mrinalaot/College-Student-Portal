<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Student_db;
use App\Ssc_hs_db;
use App\Btech_mtech_mca_db;
use App\Academic_records_db;
use App\Year_gap_db;
use Auth;
use Storage;

///////////////////////////////////////
use Illuminate\Support\Facades\Mail;
use App\Mail\MailProfileUpdate;
use App\Mail\MailChangePassword;
use App\Mail\MailRegistrationFinish;
//////////////////////////////////////

class StudentController extends Controller
{
    public function index(){
    	$user=Auth::user();
        
        $handle = fopen("value", "r");
        if ($handle) {
            while(($line = fgets($handle)) !== false) {
                if(strpos($line, "EDIT") !== false)
                    $edit = explode('=', $line)[1];
            }
            fclose($handle);
        }

        $studentDB = Student_db::where('form_id',$user->form_id)->first();
        if($studentDB == null)
        {
           $studentDB = new Student_db;
           $studentDB->form_id = $user->form_id;
           $studentDB->reg_code = $user->reg_code;
           $studentDB->save();
        }

        $sscDB = Ssc_hs_db::where('form_id',$user->form_id)->first();
        if($sscDB == null)
        {
           $sscDB = new Ssc_hs_db;
           $sscDB->form_id = $user->form_id;
           $sscDB->reg_code = $user->reg_code;
           $sscDB->save();
        }

        $academicDB = Academic_records_db::where('form_id',$user->form_id)->first();
        if($academicDB == null)
        {
            $academicDB = new Academic_records_db;
            $academicDB->form_id = $user->form_id;
            $academicDB->reg_code = $user->reg_code;
            $academicDB->save();
        }

        $yeargapDB = Year_gap_db::where('form_id',$user->form_id)->first();
        if($yeargapDB == null)
        {
            $yeargapDB = new Year_gap_db;
            $yeargapDB->form_id = $user->form_id;
            $yeargapDB->reg_code = $user->reg_code;
            $yeargapDB->save();
        }

        $btechDB = Btech_mtech_mca_db::where('form_id',$user->form_id)->first();
        if($btechDB == null)
        {
            $btechDB = new Btech_mtech_mca_db;
            $btechDB->form_id = $user->form_id;
            $btechDB->reg_code = $user->reg_code;
            $btechDB->save();
        }
        
        return view('student.home')->with('user',$user)
                                   ->with('studentDB',$studentDB)
                                   ->with('sscDB',$sscDB)
                                   ->with('academicDB',$academicDB)
                                   ->with('yeargapDB',$yeargapDB)
                                   ->with('btechDB',$btechDB)->withEdit($edit) ;

    
     }


    public function profile(){
    	$user=Auth::user();
    	return view('student.profile')->with('user',$user); 
    }



    public function update_profile(Request $request){
        $user=Auth::user();
        try
        {
        $user->user_name=$request->user_name;
        $user->email=$request->email;
        if($request->avatar != null)
        {
            $user->avatar = $user->form_id.".jpg";

            // $source = 'storage/avatars/'.$user->avatar;
            // $dest = $source;
            // $info = getimagesize($source);
            // $d = compress($source, $dest, 50);

            $request->file('avatar')->storeAs('avatars', $user->form_id.".jpg");
        }
        $user->save();
        $request->session()->flash('alert-success', 'Profile Updated Successfully!'.$d);
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
       return view('student.change_password')->with('user',$user);
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
        $user=Auth::user();
        $s= Student_db::where('form_id',$user->form_id)->first();
        if($s == null)
           $s = new Student_db;
           
        $s->form_id = $user->form_id;
        $s->reg_code = $user->reg_code; 
        

             $s->name = strtoupper($request->name) ;
             $s->year_of_admission = (int)($request->year_of_admission) ;   //check 
             $s->is_readmission = strtoupper($request->is_readmission);      
             $s->actual_year_of_admission = (int)($request->actual_year_of_admission);  //check
             $s->dob = $request->dob;             //check
             $s->enrollment_no = (int)($request->enrollment_no);   //check

            $s->rank_type = strtoupper($request->rank_type);
            $s->rank = strtoupper($request->rank);
            $s->is_tfw = strtoupper($request->is_tfw);
            $s->discipline = strtoupper($request->discipline);
            $s->is_lateral = strtoupper($request->is_lateral);

            $s->place_of_birth = strtoupper($request->place_of_birth);
            $s->district = strtoupper($request->district) ;
            $s->state = strtoupper($request->state);
            $s->nationality = strtoupper($request->nationality);
            $s->sex = strtoupper($request->sex);
            $s->blood_group = strtoupper($request->blood_group) ;
            $s->category = strtoupper($request->category) ;
            $s->residential_status = strtoupper($request->residential_status) ;
            $s->religion = strtoupper($request->religion) ;
            $s->is_minority = strtoupper($request->is_minority) ;

//            $s->current_year = $request->;

//            $s->registration_no = $request->;


            $s->save();
        //DB::insert('insert into test (id,name) values (?,?)',[1, $request->name]);
        $request->session()->flash('alert-success', 'Data Saved Successfully !');
        return back();

    }
    public function form_submit_2(Request $request)
    {
        //DB::insert('insert into test (id,name) values (?,?)',[2, $request->ssc_school_name]);

        //from ssc_hs_db

         $user=Auth::user();
        $s= ssc_hs_db::where('form_id',$user->form_id)->first();
       if($s == null)
           $s = new ssc_hs_db;
               
            $s->form_id = $user->form_id;
            $s->reg_code = $user->reg_code; 

            $s->ssc_sub_name_1 =  strtoupper($request->ssc_sub_name_1);
            $s->ssc_sub_name_2 =  strtoupper($request->ssc_sub_name_2);
            $s->ssc_sub_name_3 =  strtoupper($request->ssc_sub_name_3);
            $s->ssc_sub_name_4 =  strtoupper($request->ssc_sub_name_4);
            $s->ssc_sub_name_5 =  strtoupper($request->ssc_sub_name_5);
            $s->ssc_sub_name_6 =  strtoupper($request->ssc_sub_name_6);
            $s->ssc_sub_name_7 =  strtoupper($request->ssc_sub_name_7);
            $s->ssc_sub_name_8 =  strtoupper($request->ssc_sub_name_8);
            $s->ssc_sub_name_9 =  strtoupper($request->ssc_sub_name_9);
            $s->ssc_sub_total_1 = $request->ssc_sub_total_1;
            $s->ssc_sub_total_2 = $request->ssc_sub_total_2;
            $s->ssc_sub_total_3 = $request->ssc_sub_total_3;
            $s->ssc_sub_total_4 = $request->ssc_sub_total_4;
            $s->ssc_sub_total_5 = $request->ssc_sub_total_5;
            $s->ssc_sub_total_6 = $request->ssc_sub_total_6;
            $s->ssc_sub_total_7 = $request->ssc_sub_total_7;
            $s->ssc_sub_total_8 = $request->ssc_sub_total_8;
            $s->ssc_sub_total_9 = $request->ssc_sub_total_9;
            $s->ssc_sub_marks_1 = $request->ssc_sub_marks_1;
            $s->ssc_sub_marks_2 = $request->ssc_sub_marks_2;
            $s->ssc_sub_marks_3 = $request->ssc_sub_marks_3;
            $s->ssc_sub_marks_4 = $request->ssc_sub_marks_4;
            $s->ssc_sub_marks_5 = $request->ssc_sub_marks_5;
            $s->ssc_sub_marks_6 = $request->ssc_sub_marks_6;
            $s->ssc_sub_marks_7 = $request->ssc_sub_marks_7;
            $s->ssc_sub_marks_8 = $request->ssc_sub_marks_8;
            $s->ssc_sub_marks_9 = $request->ssc_sub_marks_9;


            $s->hs_sub_name_1 =  strtoupper($request->hs_sub_name_1);
            $s->hs_sub_name_2 =  strtoupper($request->hs_sub_name_2);
            $s->hs_sub_name_3 =  strtoupper($request->hs_sub_name_3);
            $s->hs_sub_name_4 =  strtoupper($request->hs_sub_name_4);
            $s->hs_sub_name_5 =  strtoupper($request->hs_sub_name_5);
            $s->hs_sub_name_6 =  strtoupper($request->hs_sub_name_6);
            $s->hs_sub_name_7 =  strtoupper($request->hs_sub_name_7);
            $s->hs_sub_name_8 =  strtoupper($request->hs_sub_name_8);
            $s->hs_sub_name_9 =  strtoupper($request->hs_sub_name_9);
            $s->hs_sub_total_1 = $request->hs_sub_total_1;
            $s->hs_sub_total_2 = $request->hs_sub_total_2;
            $s->hs_sub_total_3 = $request->hs_sub_total_3;
            $s->hs_sub_total_4 = $request->hs_sub_total_4;
            $s->hs_sub_total_5 = $request->hs_sub_total_5;
            $s->hs_sub_total_6 = $request->hs_sub_total_6;
            $s->hs_sub_total_7 = $request->hs_sub_total_7;
            $s->hs_sub_total_8 = $request->hs_sub_total_8;
            $s->hs_sub_total_9 = $request->hs_sub_total_9;
            $s->hs_sub_marks_1 = $request->hs_sub_marks_1;
            $s->hs_sub_marks_2 = $request->hs_sub_marks_2;
            $s->hs_sub_marks_3 = $request->hs_sub_marks_3;
            $s->hs_sub_marks_4 = $request->hs_sub_marks_4;
            $s->hs_sub_marks_5 = $request->hs_sub_marks_5;
            $s->hs_sub_marks_6 = $request->hs_sub_marks_6;
            $s->hs_sub_marks_7 = $request->hs_sub_marks_7;
            $s->hs_sub_marks_8 = $request->hs_sub_marks_8;
            $s->hs_sub_marks_9 = $request->hs_sub_marks_9;
            $s->pcm_total_marks = $request->pcm_total_marks;
            $s->save();

        //From academic_records db

            //roll_no= $request->;

       
        $p= academic_records_db::where('form_id',$user->form_id)->first();
        if($p == null)
           $p = new academic_records_db;
           
            $p->form_id = $user->form_id;
            $p->reg_code = $user->reg_code; 

            // academic records roll_no
            
            $p->ssc_school_name =  strtoupper($request->ssc_school_name) ;
            $p->ssc_medium      =  strtoupper($request->ssc_medium) ;
            $p->ssc_division    =  strtoupper($request->ssc_division) ; 
            $p->ssc_percentage  = (double)($request->ssc_percentage);       //int to double
            $p->ssc_board       =  strtoupper($request->ssc_board);

            $p->hs_school_name  =  strtoupper($request->hs_school_name);
            $p->hs_percentage   = (double)($request->hs_percentage);         //int to double
            $p->hs_medium       =  strtoupper($request->hs_medium);
            $p->hs_division     =  strtoupper($request->hs_divison);
            $p->hs_board        =  strtoupper($request->hs_board);


            $p->diploma_college_name =  strtoupper($request->diploma_college_name);
            $p->diploma_division     =  strtoupper($request->diploma_division);
            $p->diploma_medium       =  strtoupper($request->diploma_medium);
            $p->diploma_board        =  strtoupper($request->diploma_board);
            $p->diploma_percentage   = (double)($request->diploma_percentage);   //int to double

            $p->grad_college_name   =  strtoupper($request->grad_college_name);
            $p->grad_medium         =  strtoupper($request->grad_medium);
            $p->grad_division       =  strtoupper($request->grad_division);
            $p->grad_board          =  strtoupper($request->grad_board);
            $p->grad_percentage     = (double)($request->grad_percentage); //int to double/


            $p->btech_college_name  =  strtoupper($request->btech_college_name);
            $p->btech_medium        =  strtoupper($request->btech_medium);
            $p->btech_division       =  strtoupper($request->btech_division);
            $p->btech_board         =  strtoupper($request->btech_board);
            $p->btech_percentage    = (double)($request->btech_percentage);       //int to double/

             $p -> save();


            //from year_gap_db
             $r= year_gap_db::where('form_id',$user->form_id)->first();
            if($r == null)
                $r = new year_gap_db;

            $r->form_id = $user->form_id;
            $r->reg_code = $user->reg_code; 

            //$r->roll_no =

            $r->ssc_year_of_join    = $request->ssc_year_of_join ;
            $r->ssc_year_of_pass    = $request->ssc_year_of_pass ;
            $r->eleven_year_of_join = $request->eleven_year_of_join ;
            $r->eleven_year_of_pass = $request->eleven_year_of_pass ;
            $r->hs_year_of_join     = $request->hs_year_of_join ;
            $r->hs_year_of_pass      = $request->hs_year_of_pass ;
            $r->diploma_year_of_join = $request->diploma_year_of_join ;
            $r->diploma_year_of_pass = $request->diploma_year_of_pass ;
            $r->grad_year_of_join   = $request->grad_year_of_join ;
            $r->grad_year_of_pass   = $request->grad_year_of_pass ;
            $r->mca_year_of_join    = $request->mca_year_of_join ;
            $r->mca_year_of_pass    = $request->mca_year_of_pass ;
            $r->btech_year_of_join  = $request->btech_year_of_join ;
            $r->btech_year_of_pass = $request->btech_year_of_pass ;
            $r->mtech_year_of_join = $request->mtech_year_of_join ;
            $r->mtech_year_of_pass = $request->mtech_year_of_pass ;

            $r->save();
          
          
            // $p->btech_agg= $request->;

            // $p->ssc_agg= $request->;
            // $p->hs_agg= $request->;
            // $p->diploma_agg= $request->;
            // $p->grad_agg= $request->;
            // $p->ssc_no_of_sub= $request->;
            // $p->hs_no_of_sub= $request->;
            // $p->diploma_no_of_sub= $request->;
            // $p->grad_no_of_sub= $request->;
   
    }
    public function form_submit_3(Request $request)
    {
        //DB::insert('inset into test (x,y) values (?,?)',[1, $request->ssc_school_name]);

        // DB::update('update student_dbs set name=?',[$request->name]);
        // return back();
        $user=Auth::user();
        $s= student_db::where('form_id',$user->form_id)->first();
           
            $s->father_name         = strtoupper($request->father_name) ;
            $s->father_age          = $request->father_age ;
            $s->father_qualification = strtoupper($request->father_qualification) ;           
            $s->father_occupation    = strtoupper($request->father_occupation) ;
            $s->father_org           = strtoupper($request->father_org) ;

            $s->mother_name          = strtoupper($request->mother_name) ;
            $s->mother_age           = $request->mother_age; 
            $s->mother_qualification = strtoupper($request->mother_qualification) ; 
            $s->mother_occupation    = strtoupper($request->mother_occupation) ;
            $s->mother_org           = strtoupper($request->mother_org) ;         

            $s->guardian_name        = strtoupper($request->guardian_name) ;
            $s->guardian_age         = $request->guardian_age ;
            $s->guardian_qualification = strtoupper($request->guardian_qualification) ;
            $s->guardian_occupation  = strtoupper($request->guardian_occupation) ;
            $s->guardian_org        = strtoupper($request->guardian_org) ;
            $s->save();




    }
    public function form_submit_4(Request $request)
    {
        // DB::update('update student_dbs set name=?',[$request->name]);
        // return back();

        $user=Auth::user();
        $s= student_db::where('form_id',$user->form_id)->first();

           $s->permanent_add     = strtoupper($request->permanent_add) ;
            $s->present_add      = strtoupper($request->present_add) ;
            $s->present_city     = strtoupper($request->present_city) ;
            $s->pin_no           = $request->pin_no ;
            $s->telephone_no     = $request->telephone_no ;
            $s->guardian_1_contact = $request->guardian_1_contact;
            $s->guardian_2_contact = $request->guardian_2_contact;
            $s->stu_mobile1_no     = $request->stu_mobile1_no;
            $s->stu_mobile2_no       = $request->stu_mobile2_no;
            $s->aot_mail_id         = $request->aot_mail_id;
            $s->alt_mail_id         = $request->alt_mail_id;

            $s->save();
        Mail::to($user->email)->send(new MailRegistrationFinish($user));
        $request->session()->flash('alert-success', 'Data Saved Successfully !');
        return back();
           

    }
    public function form_submit_5(Request $request)
    {
        // DB::update('update student_dbs set name=?',[$request->name]);
        // return back();
        //DB::insert('insert into test (id,name) values (?,?)',[5, $request->family_income]);

        $user=Auth::user();
        
        
        $s= Student_db::where('form_id',$user->form_id)->first();

        $s->family_income = $request->family_income ; 
        $s->is_scholar = strtoupper($request->is_scholar) ;

        $s->voter_no     = $request->voter_no ;
        $s->aadhar_no    = $request->aadhar_no ;
        $s->pan_no       = $request->pan_no ;
        $s->passport_no  = $request->passport_no ;
        $s->lang_known   = strtoupper($request->lang_known);
 
        $s->is_migrate = strtoupper($request->is_migrate) ;
        $s->mi_institute =strtoupper( $request->mi_institute) ;
        $s->mi_session = strtoupper($request->mi_session);
        $s->mi_university = strtoupper($request->mi_university) ;
        $s->additional_info = strtoupper($request->additional_info) ;
        $s->status = "1";
        // verify
        // $request->agree;
        //from user_db
       
        if($request->avatar != null)
        {
            $user->avatar = $user->form_id.".jpg";
            $request->file('avatar')->storeAs('avatars', $user->form_id.".jpg");
            
            $user->save();
        }  
        $s->save();
             
        // Mail::to($user->email)->send(new MailRegistrationFinish($user));
        // $request->session()->flash('alert-success', 'Data Saved Successfully !');
        // return back();
    }


    public function print_view(Request $request)
    {
        $user=Auth::user();
        $studentDB = Student_db::where('form_id',$user->form_id)->first();
        if($studentDB == null)
           $studentDB = new Student_db;

        $sscDB = Ssc_hs_db::where('form_id',$user->form_id)->first();
        
        if($sscDB == null)
            $sscDB = new Ssc_hs_db;

        $academicDB = Academic_records_db::where('form_id',$user->form_id)->first();
        if($academicDB == null)
            $academicDB = new Academic_records_db;

        $yeargapDB = Year_gap_db::where('form_id',$user->form_id)->first();
        if($yeargapDB == null)
            $yeargapDB = new Year_gap_db;

        $btechDB = Btech_mtech_mca_db::where('form_id',$user->form_id)->first();
        if($btechDB == null)
            $btechDB = new Btech_mtech_mca_db;

        return view('student.print_view1')->with('user',$user)
                                   ->with('studentDB',$studentDB)
                                   ->with('sscDB',$sscDB)
                                   ->with('academicDB',$academicDB)
                                   ->with('yeargapDB',$yeargapDB)
                                   ->with('btechDB',$btechDB);
    }

    public function compress($source, $destination, $quality) {

		$info = getimagesize($source);

		if ($info['mime'] == 'image/jpeg') 
			$image = imagecreatefromjpeg($source);

		elseif ($info['mime'] == 'image/gif') 
			$image = imagecreatefromgif($source);

		elseif ($info['mime'] == 'image/png') 
			$image = imagecreatefrompng($source);

		imagejpeg($image, $destination, $quality);

		return $destination;
	}

}
