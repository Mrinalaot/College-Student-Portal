

<!DOCTYPE html>
<html lang="en">
  <head>

  
  <meta charset="utf-8" />
    <title>Profile of MRINAL KANTI GHOSH - AOT</title>
    <script src="{{ asset('assets/jquery.js') }}"></script>
    <script src="{{ asset('/assets/bootstrap/js/bootstrap.min.js') }}"></script>

    <link type="text/css" href="{{ asset('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('/assets/styles/app.css') }}" rel="stylesheet" />
  </head>

<body>

<div style="padding-left:10px;padding-right:15px;width:900px;margin:auto;margin-top:10px;" id="header">
        <div style="width:auto;height:10px;background-color:#FFCC00;border-top-right-radius:18px;border-top-left-radius:18px"></div>
        
             <img style="margin-top:5px;margin-bottom:5px;float:left;" src="http://aot.edu.in/themes/garland_bck/aot-logo.jpg ">        
             <h2 style="font-weight:bold;text-transform:uppercase;float:left;color:#232C69;font-family:book antiqua;font-size:32px;margin-bottom:0;">
		Academy of Technology
		<div style="font-size:14px;font-weight:normal;margin-bottom:-17px;margin-top:-15px;text-align:right;text-transform:none;"><b><i>... translate your vision into reality</i></b></div>
	     </h2>
        		<div style="clear:both;"></div>	
        <div style="width:auto;height:10px;background-color:#FFCC00;border-bottom-right-radius:18px;border-bottom-left-radius:18px"></div>
 </div>

 <div id="container">

 <script>
function myFunction_print()
{
window.print();
}
</script>



<div class="studentdataWrapper">

    <h2>Student Profile</h2>
    <!-- <div class="photo"></div> //-->
    
    <table class="table table-bordered profileformtable">
       <thead>
                <tr>
                    <th colspan="3">Personal/General Detail</th>
                </tr>
       </thead>
       <tbody>
           <tr>
               <td rowspan="20" style="width:100px;"><img src="{{ asset('/storage/avatars') }}/{{ $user->avatar }}" class="img-polaroid" border="0"/></td>
               <td class="flabel">Student ID</td>
               <td>{{ $studentDB->form_id }}</td>
           </tr>   
            <tr>
               <td class="flabel">Name</td>
               <td>{{ $studentDB->name }}
             
                &nbsp;&nbsp;&nbsp;&nbsp;
               <b>Year of Admission/Re-Admission:</b>
               {{ $studentDB->year_of_admission }}

               </td> 
           </tr>   
    
    <tr>
                   <td class="flabel">Current Year</td>
               <td>{{ $studentDB->current_year }}</td>

    </tr>
    
    
   
             <tr>
               <td class="flabel">Registration No</td>
               <td>{{ $studentDB->regnum }}
               &nbsp;&nbsp;&nbsp;&nbsp;               
                 <b>Roll No:</b>  
                 {{ $studentDB->roll_no }}           
               </td>
           </tr>
    
                 <tr>
               <td class="flabel">Re-Admission</td>
               <td>{{ $studentDB->is_readmission }}
               &nbsp;&nbsp;&nbsp;&nbsp;               
                 <b>Actual Year of Admission (if Re-Admission):</b>  
                 {{ $studentDB->actual_year_of_admission }}   
                                
                         
               </td>
           </tr>
    
    
                      
           
            <tr>
               <td class="flabel">Form ID</td>
               <td>{{ $studentDB->form_id }}</td>
           </tr>   
           
           <tr>
               <td class="flabel">Enrollment No</td>
               <td>{{ $studentDB->enrollment_no }} &nbsp;&nbsp;&nbsp;&nbsp;<b>Rank:</b> {{ $studentDB->rank_type }} - {{ $studentDB->rank }}  <b>TFW:</b> {{ $studentDB->is_tfw }}</td>
           </tr>   
           <tr>
               <td class="flabel">Discipline</td>
               <td>{{ $studentDB->discipline }} &nbsp;&nbsp;&nbsp;&nbsp;<b>Lateral Entry:</b> {{ $studentDB->lateral }}</td>
           </tr>
           <tr>
               <td class="flabel">Name of Father</td>
               <td>{{ $studentDB->father_name }}</td>
           </tr>
           <tr>
               <td class="flabel">Mother's Maiden Name</td>
               <td>{{ $studentDB->mother_name }}</td>
           </tr>
           <tr>
               <td class="flabel">Gurdian's Name</td>
               <td>{{ $studentDB->guardian_name }}</td>
           </tr>
           <tr>
               <td class="flabel">Birth Date</td>
               <td>{{ $studentDB->dob }} </td>
           </tr>
           <tr>
               <td class="flabel">Place of Birth</td>
               <td>{{ $studentDB->place_of_birth }} &nbsp;&nbsp;&nbsp;&nbsp;<b>Dist:</b> {{ $studentDB->district }} 
                   &nbsp;&nbsp;&nbsp;&nbsp;<b>State: </b>{{ $studentDB->state }}</td>
           </tr>
           <tr>
               <td class="flabel">Nationality</td>
               <td>{{ $studentDB->nationality }}</td>
           </tr>
           <tr>
               <td class="flabel">Sex</td>
               <td>{{ $studentDB->sex }}</td>
           </tr>
          
            <tr>
               <td class="flabel">Blood Group</td>
               <td>{{ $studentDB->blood_group }}</td>
           </tr>
         
          
          
           <tr>
               <td class="flabel">Category</td>
               <td>{{ $studentDB->category }}</td>
           </tr>
           <tr>
               <td class="flabel">Residential Status</td>
               <td>{{ $studentDB->residential_status }}</td>
           </tr>
          
                      
          
          
           <tr>
               <td class="flabel">Religion</td>
               <td>{{ $studentDB->religion }}</td>
           </tr>
           <tr>
               <td class="flabel">Whether Minority</td>
               <td>{{ $studentDB->is_minority }}</td>
           </tr>
       </tbody>
    </table>
    
    
    
    
     <table class="table table-bordered profileformtable">
              <thead>
                <tr>
                    <th colspan="6">Academic Records</th>
                </tr>
                <tr>
                    <th>Examination</th>
                    <th>School/College</th>
                    <th>Medium of Instruction</th>
                    <th>Division</th>
                    <th>% of marks</th>
                    <th>Board/Council/University</th>
                </tr>
              </thead>
             
              
              <tbody>
                  
                  
                 <tr>
                     <td class="flabel2">Matricullation/SSC</td>
                    
                     <td>{{ $academicDB->ssc_school_name }}</td>
                     <td>{{ $academicDB->ssc_medium  }}</td> 
                     <td>{{ $academicDB->ssc_division }}</td>
                     <td>{{ $academicDB->ssc_percentage }}</td>
                     <td>{{ $academicDB->ssc_board }}</td>
                </tr>
                
                
                  <tr>
                     <td class="flabel2">10+2 Or Equivalent</td>
                     <td>{{ $academicDB->hs_school_name }}</td>
                     <td>{{ $academicDB->hs_medium  }}</td> 
                     <td>{{ $academicDB->hs_division }}</td>
                     <td>{{ $academicDB->hs_percentage }}</td>
                     <td>{{ $academicDB->hs_board }}</td>
                </tr>
                
                
                  <tr>
                    <td class="flabel2">Diploma in Engineering</td>
                    <td>{{ $academicDB->diploma_college_name }}</td>
                     <td>{{ $academicDB->diploma_medium  }}</td> 
                     <td>{{ $academicDB->diploma_division }}</td>
                     <td>{{ $academicDB->diploma_percentage }}</td>
                     <td>{{ $academicDB->diploma_board }}</td>
                </tr>
                
                
                  <tr>
                     
                     <td class="flabel2">Graduation/Equivalent</td>
                     <td>{{ $academicDB->grad_college_name }}</td>
                     <td>{{ $academicDB->grad_medium  }}</td> 
                     <td>{{ $academicDB->grad_division }}</td>
                     <td>{{ $academicDB->grad_percentage }}</td>
                     <td>{{ $academicDB->grad_board }}</td>
                </tr>         
                
              </tbody>
                            
     </table>
     
     
<!-- add semester marks details -->
     
    
    
 
 
    <table class="table table-bordered profileformtable">
              <thead>
                <tr>
                    <th colspan="6">Subject Wise Marks Details (10+2 Or Equivalent)</th>
                </tr>
                <tr>
                    <th>Subject</th>
                    <th>Total Marks</th>
                    <th>Marks Obtained</th>
                </tr>
              </thead>
              
              <tbody>
                  
                   <tr>
                        <td class="flabel2">{{ $sscDB->hs_sub_name_1 }}</td>
                        
                        <td>{{ $sscDB->hs_sub_total_1 }}</td>
                        <td>{{ $sscDB->hs_sub_marks_1 }}</td>
                    </tr>
                  
                  
                    <tr>
                        <td class="flabel2">{{ $sscDB->hs_sub_name_2 }}</td>
                        <td>{{ $sscDB->hs_sub_total_2 }}</td>
                        <td>{{ $sscDB->hs_sub_marks_2 }}</td>
                    </tr>
                    
                    <tr><td class="flabel2">{{ $sscDB->hs_sub_name_3 }}</td>
                        <td>{{ $sscDB->hs_sub_total_3 }}</td>
                        <td>{{ $sscDB->hs_sub_marks_3 }}</td>
                    </tr>
                    
                    <tr>
                        <td class="flabel2">{{ $sscDB->hs_sub_name_4 }}</td>
                        <td>{{ $sscDB->hs_sub_total_4 }}</td>
                        <td>{{ $sscDB->hs_sub_marks_4 }}</td>
                    </tr>
                    
                    <tr>
                        <td class="flabel2">{{ $sscDB->hs_sub_name_5 }}</td>
                        <td>{{ $sscDB->hs_sub_total_5 }}</td>
                        <td>{{ $sscDB->hs_sub_marks_5 }}</td>
                    </tr>
                    
                    
                        <tr>
                        <td>{{ $sscDB->hs_sub_name_6 }}</td>
                        <td>{{ $sscDB->hs_sub_total_6 }}</td>
                        <td>{{ $sscDB->hs_sub_marks_6 }}</td>
                    </tr>
                    
                    
                        <tr>
                        <td>{{ $sscDB->hs_sub_name_7 }}</td>
                        <td>{{ $sscDB->hs_sub_total_7 }}</td>
                        <td>{{ $sscDB->hs_sub_marks_7 }}</td>
                    </tr>
                    
                    
                    
                        <tr>
                        <td>{{ $sscDB->hs_sub_name_8 }}</td>
                        <td>{{ $sscDB->hs_sub_total_8 }}</td>
                        <td>{{ $sscDB->hs_sub_marks_8 }}</td>
                    </tr>
                        <tr>
                        <td>{{ $sscDB->hs_sub_name_9 }}</td>
                        <td>{{ $sscDB->hs_sub_total_9 }}</td>
                        <td>{{ $sscDB->hs_sub_marks_9 }}</td>
                    </tr>
                   

              </tbody>
              
              
    </table>
    
    
 
    
  <table class="table table-bordered profileformtable">
              <thead>
                <tr>
                    <th colspan="6">PCM Total</th>
                </tr>
                  </thead>
                
                             <td class="flabel2">Total Marks Obtained in PCM</td>
                       
                        <td>{{ $sscDB->pcm }}</td>


 
 </table>
 
 
 
 
 
 
 
  <table class="table table-bordered profileformtable">
              <thead>
                <tr>
                    <th colspan="6">Subject Wise Marks Details (Matriculation/SSC)</th>
                </tr>
                <tr>
                    <th>Subject</th>
                    <th>Total Marks</th>
                    <th>Marks Obtained</th>
                </tr>
              </thead>
              
              <tbody>
                                  
                  
                                       
                        <tr>
                        <td>{{ $sscDB->ssc_sub_name_1 }}</td>
                        <td>{{ $sscDB->ssc_sub_total_1 }}</td>
                        <td>{{ $sscDB->ssc_sub_marks_1 }}</td>
                    </tr>
                    
                    
                        <tr>
                        <td>{{ $sscDB->ssc_sub_name_2 }}</td>
                        <td>{{ $sscDB->ssc_sub_total_2 }}</td>
                        <td>{{ $sscDB->ssc_sub_marks_2 }}</td>
                    </tr>
                    
                    
                    
                        <tr>
                        <td>{{ $sscDB->ssc_sub_name_3 }}</td>
                        <td>{{ $sscDB->ssc_sub_total_3 }}</td>
                        <td>{{ $sscDB->ssc_sub_marks_3 }}</td>
                    </tr>
                    
                      <tr>
                        <td>{{ $sscDB->ssc_sub_name_4 }}</td>
                        <td>{{ $sscDB->ssc_sub_total_4 }}</td>
                        <td>{{ $sscDB->ssc_sub_marks_4 }}</td>
                    </tr>
                    
                      <tr>
                        <td>{{ $sscDB->ssc_sub_name_5 }}</td>
                        <td>{{ $sscDB->ssc_sub_total_5 }}</td>
                        <td>{{ $sscDB->ssc_sub_marks_5 }}</td>
                    </tr>



  <tr>
                        <td>{{ $sscDB->ssc_sub_name_6 }}</td>
                        <td>{{ $sscDB->ssc_sub_total_6 }}</td>
                        <td>{{ $sscDB->ssc_sub_marks_6 }}</td>
                    </tr>



  <tr>
                        <td>{{ $sscDB->ssc_sub_name_7 }}</td>
                        <td>{{ $sscDB->ssc_sub_total_7 }}</td>
                        <td>{{ $sscDB->ssc_sub_marks_7 }}</td>
                    </tr>



  <tr>
                        <td>{{ $sscDB->ssc_sub_name_8 }}</td>
                        <td>{{ $sscDB->ssc_sub_total_8 }}</td>
                        <td>{{ $sscDB->ssc_sub_marks_8 }}</td>
                    </tr>
                    
  <tr>
                        <td>{{ $sscDB->ssc_sub_name_9 }}</td>
                        <td>{{ $sscDB->ssc_sub_total_9 }}</td>
                        <td>{{ $sscDB->ssc_sub_marks_9 }}</td>
                    </tr>
                    
              </tbody>
              
              
    </table>   
    
   
   
<!-- Graduation details-->
   
 
 
 
   <table class="table table-bordered profileformtable">
              <thead>
                <tr>
                    <th colspan="6">Academic Year Gap</th>
                </tr>
                <tr>
                    <th>Examination</th>
                    <th>Year of Joining</th>
                    <th>Year of Passing</th>                   
                </tr>
              </thead>
              
              <tbody>
 
     <tr>
                        
                        <td class="flabel2">Matriculation</td>
                        
                        <td>{{ $yeargapDB->ssc_year_of_join }}</td>
                        <td>{{ $yeargapDB->ssc_year_of_pass }}</td>                     
                    </tr>
      <tr>
                        
                        <td class="flabel2">Class XI</td>
                        
                        <td>{{ $yeargapDB->eleven_year_of_join }}</td>
                        <td>{{ $yeargapDB->eleven_year_of_pass }}</td>                     
                    </tr> 
      <tr>
                        
                        <td class="flabel2">Higher Secondary</td>
                        
                        <td>{{ $yeargapDB->hs_year_of_join }}</td>
                        <td>{{ $yeargapDB->hs_year_of_pass }}</td>                     
                    </tr>             
       <tr>
                        
                        <td class="flabel2">Diploma</td>
                        
                        <td>{{ $yeargapDB->diploma_year_of_join }}</td>
                        <td>{{ $yeargapDB->diploma_year_of_pass}}</td>                     
                    </tr>           
       <tr>
                        
                        <td class="flabel2">Graduation</td>
                        
                        <td>{{ $yeargapDB->grad_year_of_join }}</td>
                        <td>{{ $yeargapDB->grad_year_of_pass }}</td>                     
                    </tr>            
        <tr>
                        
                        <td class="flabel2">B. Tech</td>
                        
                        <td>{{ $yeargapDB->btech_year_of_join }}</td>
                        <td>{{ $yeargapDB->btech_year_of_pass }}</td>                     
                    </tr>           
        <tr>
                        
                        <td class="flabel2">M. Tech</td>
                        
                        <td>{{ $yeargapDB->mtech_year_of_join }}</td>
                        <td>{{ $yeargapDB->mtech_year_of_pass }}</td>                     
                    </tr>           
        <tr>
                        
                        <td class="flabel2">MCA</td>
                        
                        <td>{{ $yeargapDB->mca_year_of_join }}</td>
                        <td>{{ $yeargapDB->mca_year_of_pass }}</td>                     
                    </tr>           
            
              </tbody>  
   
   
   
    
    
    <table class="table table-bordered profileformtable">
              <thead>
                <tr>
                    <th colspan="7">Family Background</th>
                </tr>
                <tr>
                    <th>Particulars</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Qualification</th>
                    <th>Occupation</th>
                    <th>Organisation</th>
                </tr>
              </thead>
              
              <tbody>
                  
                  
                   <tr>                      
                      <td class="flabel">Father</td>
                      <td>{{ $studentDB->father_name  }}</td>
                      <td>{{ $studentDB->father_age }}</td>
                      <td>{{ $studentDB->father_qualification }}</td>
                      <td>{{ $studentDB->father_occupation  }}</td>
                      <td>{{ $studentDB->father_org }}</td>
                  </tr>
                  
                  
                   <tr>                      
                      <td class="flabel">Mother</td>
                      <td>{{ $studentDB->mother_name  }}</td>
                      <td>{{ $studentDB->mother_age }}</td>
                      <td>{{ $studentDB->mother_qualification }}</td>
                      <td>{{ $studentDB->mother_occupation  }}</td>
                      <td>{{ $studentDB->mother_org }}</td>
                  </tr>
                  
                  
                   <tr>                      
                      <td class="flabel">Guardian</td>
                      <td>{{ $studentDB->guardian_name  }}</td>
                      <td>{{ $studentDB->guardian_age }}</td>
                      <td>{{ $studentDB->guardian_qualification }}</td>
                      <td>{{ $studentDB->guardian_occupation  }}</td>
                      <td>{{ $studentDB->guardian_org }}</td>    
                  </tr>
                                
        
                  
              </tbody>
              
              
              
    </table>
    
    
    
    
    
    
    
    
    
     <table class="table bigflabel table-bordered profileformtable">
              <thead>
                <tr>
                    <th colspan="6">Other Details</th>
                </tr>
              </thead>
              
              
              <tbody>
                  
                  <tr>
                      <td class="flabel">Family Income</td>
                      <td>{{ $studentDB->family_income }}</td>
                  </tr>
                  
                  <tr>
                      <td class="flabel">Scholarship Received</td>
                      <td>{{ $studentDB->is_scholar }}</td>
                  </tr>
                  
                  <tr>
                      <td class="flabel">Additional Information </td>
                      <td>{{ $studentDB->additional_info }}</td>
                  </tr>
                  
                  <tr>
                      <td class="flabel">Transfer/Migration</td>
                      <td>{{ $studentDB->is_migrate }}</td>
                  </tr>
                  
                  <tr>
                      <td class="flabel">Name of the Institute</td>
                      <td>{{ $studentDB->mi_institute}}</td>
                  </tr>
                  
                  <tr>
                      <td class="flabel">Session</td>
                      <td>{{ $studentDB->mi_session}}</td>
                  </tr>
                  
                  <tr>
                      <td class="flabel">University</td>
                      <td>{{ $studentDB->mi_university  }}</td>
                  </tr>
                  
              </tbody>
              
              
              
     </table>
    
    
    
     <table class="table bigflabel table-bordered profileformtable">
              <thead>
                <tr>
                    <th colspan="6">Correspondence Details</th>
                </tr>
              </thead>
              
              
               <tbody>
                  
                  <tr>
                      <td class="flabel">Permanent Address</td>
                      <td>{{ $studentDB->permanent_add  }}</td>
                  </tr>
                  <tr>
                      <td class="flabel">Present Address</td>
                      <td>{{ $studentDB->present_add  }}</td>
                  </tr>
                 
                 
                
                   <tr>
                      <td class="flabel">Telephone No.</td>
                      <td>{{ $studentDB->telephone_no }}</td>
                  </tr>
                  
                   <tr>
                      <td class="flabel">Gurdian Mobile No:1.</td>
                      <td>{{ $studentDB->guardian_1_contact}}</td>
                  </tr>
                  
                  
                   <tr>
                      <td class="flabel">Gurdian Mobile No:2.</td>
                      <td>{{ $studentDB->guardian_2_contact}}</td>
                  </tr>
                   
                    <tr>
                      <td class="flabel">Student Mobile No.</td>
                      <td width=30%>{{ $studentDB->stu_mobile1_no  }}</td>
                      <td>{{ $studentDB->stu_mobile2_no  }}</td>
                  </tr>
                   
                   
                   <tr>
                      <td class="flabel">Email-ID</td>
                      <td>{{ $studentDB->alt_mail_id }}</td>
                  </tr>
                  
            <tr>

                      <td colspan="6"> I do hereby affirm and declare that the above information are true and correct to the best of my knowledge and belief and nothing has been cancelled there from. I also know that in the event of wrong information my candidature may liable to be cancelled.</td>

                  </tr> 
             
             
             
             
              </tbody>
              
              
     </table>
     
        

 
  <div id="right_side" style="float:right">{{ $studentDB->name }}</div>      
 
    
    
    <div style="clear:both;"></div>
    <div class="stnActionArea">
         <button type="print" button onclick="myFunction_print()" class="btn">Print Form</button>
    </div>
</div>

</div>

</body>
</html>