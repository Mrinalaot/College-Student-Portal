@extends('student.layout.mainlayout') 
@section('content')

<script type="text/javascript">

var step = 1;

function nextCallback() {
	
  if({{ $studentDB->status }} == "0" || {{ $edit }} == "1")
  {
    //alert("{{ $edit }}");
    var id = '#form' + step;
    var path = $(id)[0].action;
   // alert(id+" "+path);
    var formData = new FormData($(id)[0]); // added for image data
    
    $(id).submit(function(e){
        e.preventDefault();

        $.ajax({
            
            type: 'POST',
            url: path,
            //data: $(id).serialize(),
             data : formData,
             cache : false,
             contentType : false,
             processData : false,
             
            success: function(data) {
                //alert("Data Saved Successfully !");
            },
            error: function(x, e) {
                alert(x.status+" "+e);
            }
        });
        return false;
    });
    $(id).validate({
        rules: {

        },
        showErrors: function(errorMap, errorList) {
                if (errorList.length) {
                var s = errorList.shift();
                var n = [];
                n.push(s);
                this.errorList = n;
            }
            this.defaultShowErrors();
        }
    });
    if($(id).valid()) {
        $(id).submit();
        step++;
        return true;
    }
    else
        return false;
  }
  else {
    return true;
  }
}

function previousCallback() {
	step--;
}

function finishCallback() {
    //alert("Finished Clicked");
    if(document.getElementById('agree').checked==true)
    {
    step = 1; //Overriding step for finish (1 - 5 all form submitted)

    nextCallback(); 
    nextCallback(); 
    nextCallback(); 
    nextCallback(); 
    nextCallback(); 
    // alert("returning from finish");
    setTimeout("location.reload(true)",1000);  //reloading same page
    //window.open("{{ url('student/print_view') }}");
    //location.reload(true);
    window.open("{{ url('student/print_view') }}");
    }
    else
        alert('Please agree to the Terms & Condition');
}

function fun(exam_type)
{
    if(exam_type=="jelet" || exam_type=='open' ||exam_type=="jeck")
    {
        //document.getElementById('is_lateral').disabled = true  ;
        document.getElementById('is_lateral').options[2].selected = true;
        // document.getElementById('dip').style.visibility = 'hidden';
        // document.getElementById('grad').style.visibility = 'hidden';
        // document.getElementById('btek').style.visibility = 'hidden';
    }
    else
    {
        //document.getElementById('is_lateral').disabled = true;
        document.getElementById('is_lateral').options[1].selected = true;
        // document.getElementById('dip').style.visibility = 'visible';
        // document.getElementById('grad').style.visibility = 'visible';
        // document.getElementById('btek').style.visibility = 'visible';
    }

}

function form_edit()
{
    if({{ $studentDB->status }} == "0" || {{ $edit }} == "1"){
         document.getElementById('f1').disabled = false;
         document.getElementById('f2').disabled = false;
         document.getElementById('f3').disabled = false;
         document.getElementById('f4').disabled = false;
         document.getElementById('f5').disabled = false;

     }
     else{
        document.getElementById('f1').disabled = true;
        document.getElementById('f2').disabled = true;
        document.getElementById('f3').disabled = true;
        document.getElementById('f4').disabled = true;
        document.getElementById('f5').disabled = true;
     }
}

function form_topnav(newstep){
    
    if(step>newstep)
    {
      alert("newstep");
      step = newstep;
    }
    else
     alert("Can't modify");
}
</script>

<style>
input[type=text]{
    text-transform:uppercase;
}
</style>


<!-- #######################################################################################################-->

<body onload="form_edit()">
<input type="hidden" value="{{ $edit }}" id="edit" >
<div class="right_col" role="main" id="what" style="min-height: initial!important;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Fill Out The Form Carefully  </h3>
                
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                
                    <div class="x_content">
                        <div id="wizard" class="form_wizard wizard_horizontal">
                            <ul class="wizard_steps">
                                <li>
                                    <a href="#step-1" onclick="form_topnav(1)">
                                        <span class="step_no">1</span>
                                        <span class="step_descr">
                                            Step 1<br />
                                            <small>Personal/General Details</small>
                                        </span>
                                    </a>
                                </li>
                                <li >
                                    <a href="#step-2" onclick="form_topnav(2)">
                                        <span class="step_no">2</span>
                                        <span class="step_descr">
                                            Step 2<br />
                                            <small>Academic Details</small>
                                        </span>
                                    </a>
                                </li>
                                <li >
                                    <a href="#step-3" onclick="form_topnav(3)">
                                        <span class="step_no">3</span>
                                        <span class="step_descr">
                                            Step 3<br />
                                            <small>Family Details</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-4" onclick="form_topnav(4)">
                                        <span class="step_no">4</span>
                                        <span class="step_descr">
                                            Step 4<br />
                                            <small>Contact Details</small>
                                        </span>
                                    </a>
                                </li>
                                <li >
                                    <a href="#step-5" onclick="form_topnav(5)">
                                        <span class="step_no">5</span>
                                        <span class="step_descr">
                                            Step 5<br />
                                            <small>Other Details</small>
                                        </span>
                                    </a>
                                </li>
                            </ul>

                            
                            <div id="step-1">
<!--  Form is here -->          
                                
                                <form class="" action="{{ url('/student/form_submit_1') }}" id="form1">
                                    @csrf
                                    <fieldset id="f1">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <th colspan="7" class="text-center">Personal Details</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>Name</td>
                                                        <td colspan="6"><input type="text" name="name" id="name" value="{{ $studentDB->name }}" placeholder="Enter Full Name" class="form-control" required></td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>Year of Admission/Re-Admission</td>
                                                        <td>
                                                            <select name="year_of_admission" id="year_of_admission"  class="form-control" required>
                                                            <option value="{{ $studentDB->year_of_admission }}" selected> {{ $studentDB->year_of_admission }} </option>
                                                                <option value="2017">2017</option>
                                                                <option value="2018">2018</option>
                                                                <option value="2019">2019</option>
                                                                <option value="2020">2020</option>
                                                                <option value="2021">2021</option>
                                                                <option value="2022">2022</option>
                                                                <option value="2023">2023</option>
                                                                <option value="2024">2024</option>
                                                                <option value="2025">2025</option>
                                                                <option value="2026">2026</option>
                                                                <option value="2027">2027</option>
                                                                <option value="2028">2028</option>
                                                                <option value="2029">2029</option>
                                                                <option value="2030">2030</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>Re-Admission</td>
                                                        <td>
                                                            <select name="is_readmission"  id="is_readmission" class="form-control" required>
                                                            <option value="{{ $studentDB->is_readmission }}" selected>{{ $studentDB->is_readmission }}</option>
                                                                <option value="no">No</option>
                                                                <option value="yes">Yes</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>Actual Year of Admission</td>
                                                        <td colspan="2">
                                                            <select name="actual_year_of_admission" id="actual_year_of_admission" class="form-control" required>
                                                            <option value="{{ $studentDB->actual_year_of_admission }}" selected>{{ $studentDB->actual_year_of_admission }}</option>
                                                                <option value="2017">2017</option>
                                                                <option value="2018">2018</option>
                                                                <option value="2019">2019</option>
                                                                <option value="2020">2020</option>
                                                                <option value="2021">2021</option>
                                                                <option value="2022">2022</option>
                                                                <option value="2023">2023</option>
                                                                <option value="2024">2024</option>
                                                                <option value="2025">2025</option>
                                                                <option value="2026">2026</option>
                                                                <option value="2027">2027</option>
                                                                <option value="2028">2028</option>
                                                                <option value="2029">2029</option>
                                                                <option value="2030">2030</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>JEE Enrollment No</td>
                                                        <td>
                                                            <input type="text" name="enrollment_no" value="{{ $studentDB->enrollment_no }}" id="enrollment_no" placeholder="Enrollment No" class="form-control" required>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>Entrance Type</td>
                                                        <td>
                                                            <select name="rank_type" id="rank_type" onchange="fun(this.value)" class="form-control" required>
                                                                <option value="{{ $studentDB->rank_type }}" selected>{{ $studentDB->rank_type }}</option>
                                                                <option value="jeemain">JEE(Main)</option>
                                                                <option value="wbjee">WBJEE</option>
                                                                <option value="jelet">JELET</option>
                                                                <option value="jeca">JECA</option>
                                                                <option value="open">OPEN</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="rank" value="{{ $studentDB->rank }}" id="rank" class="form-control" placeholder="Rank" required>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>TFW</td>
                                                        <td>
                                                            <select name="is_tfw" id="is_tfw" class="form-control" required>
                                                            <option value="{{ $studentDB->is_tfw }}" selected>{{ $studentDB->is_tfw }}</option>
                                                                <option value="no">No</option>
                                                                <option value="yes">Yes</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>Discipline</td>
                                                        <td colspan="2">
                                                            <select name="discipline" id="discipline" class="form-control" required>
                                                                <option value="{{ $studentDB->discipline }}" selected>{{ $studentDB->discipline }}</option>
                                                                <option value="cse" >CSE</option>
                                                                <option value="it">IT</option>
                                                                <option value="ece">ECE</option>
                                                                <option value="ee">EE</option>
                                                                <option value="me">ME</option>
                                                                <option value="aeie">AEIE</option>
                                                                <option value="mca">MCA</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td colspan="2">Lateral Entry</td>
                                                        <td colspan="2">
                                                            <select name="is_lateral" id="is_lateral"  class="form-control">
                                                                <option value="{{ $studentDB->is_lateral }}" selected>{{ $studentDB->is_lateral }}</option>
                                                                <option id="no" value="no" >No</option>
                                                                <option id="yes" value="yes">Yes</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>Date of Birth</td>
                                                        <td colspan="6">
                                                            <input type="text" name="dob" id="dob" value="{{ $studentDB->dob }}" class="form-control" required/>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>Place of Birth</td>
                                                        <td colspan="2">
                                                            <input type="text" name="place_of_birth" value="{{ $studentDB->place_of_birth }}" id="place_of_birth" placeholder="Enter Full Address" class="form-control" required>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>District</td>
                                                        <td>
                                                            <input type="text" name="district" value="{{ $studentDB->district }}" id="district" placeholder="district name" class="form-control"  required>
                                                        </td>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <td>State</td>
                                                        <td>
                                                            <select name="state" id="state" class="form-control" required>
                                                                <option value="{{ $studentDB->state }}" selected>{{ $studentDB->state }}</option>
                                                                <option value="WEST BENGAL">WEST BENGAL</option>
                                                                <option value="ANDHRA PRADESH">ANDHRA PRADESH</option>
                                                                <option value="ANDAMAN &amp; NICOBAR ISLANDS (UT)">ANDAMAN &amp; NICOBAR ISLANDS (UT)</option>
                                                                <option value="ARUNACHAL PRADESH">ARUNACHAL PRADESH</option>
                                                                <option value="ASSAM">ASSAM</option>
                                                                <option value="BIHAR">BIHAR</option>
                                                                <option value="CHANDIGARH (UT)">CHANDIGARH (UT)</option>
                                                                <option value="CHATTISGARH">CHATTISGARH</option>
                                                                <option value="DELHI">DELHI</option>
                                                                <option value="GOA">GOA</option>
                                                                <option value="GUJARAT">GUJARAT</option>
                                                                <option value="HARYANA">HARYANA</option>
                                                                <option value="HIMACHAL PRADES">HIMACHAL PRADES</option>
                                                                <option value="JAMMU &amp; KASHMIR">JAMMU &amp; KASHMIR</option>
                                                                <option value="JHARKHAND">JHARKHAND</option>
                                                                <option value="KARNATAKA">KARNATAKA</option>
                                                                <option value="KERALA">KERALA</option>
                                                                <option value="MADHYA PRADESH">MADHYA PRADESH</option>
                                                                <option value="MAHARASHTRA">MAHARASHTRA</option>
                                                                <option value="MANIPUR">MANIPUR</option>
                                                                <option value="MEGHALAYA">MEGHALAYA</option>
                                                                <option value="MIZORAM">MIZORAM</option>
                                                                <option value="NAGALAND">NAGALAND</option>
                                                                <option value="ORISSA">ORISSA</option>
                                                                <option value="PUNJAB">PUNJAB</option>
                                                                <option value="RAJASTHAN">RAJASTHAN</option>
                                                                <option value="SIKKIM">SIKKIM</option>
                                                                <option value="TAMIL NADU">TAMIL NADU</option>
                                                                <option value="TRIPURA">TRIPURA</option>
                                                                <option value="UTTARANCHAL">UTTARANCHAL</option>
                                                                <option value="UTTAR PRADESH">UTTAR PRADESH</option>
                                                                <option value="DADRA &amp; NAGAR HAVELI, DAMAN &amp; DIU (UT)">DADRA &amp; NAGAR HAVELI, DAMAN &amp; DIU (UT)</option>
                                                                <option value="LAKSHADWEEP (UT)">LAKSHADWEEP (UT)</option>
                                                                <option value="PONDICHERRY (UT)">PONDICHERRY (UT)</option>
                                                                <option value="C/O 99 APO">C/O 99 APO</option>
                                                                <option value="LEARNERS ABROAD">LEARNERS ABROAD</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>Nationality</td>
                                                        <td colspan="6">
                                                            <select name="nationality" id="nationality" class="form-control" required>
                                                                <option value="{{ $studentDB->nationality }}" selected>{{ $studentDB->nationality }}</option>
                                                                <option value="indian" >Indian</option>
                                                                <option value="others">Others</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>Sex</td>
                                                        <td colspan="6">
                                                            <select name="sex" id="sex" class="form-control" required>
                                                                <option value="{{ $studentDB->sex }}" selected>{{ $studentDB->sex }}</option>
                                                                <option value="male" >Male</option>
                                                                <option value="female">Female</option>
                                                                <option value="unisex">Other</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>Blood Group</td>
                                                        <td colspan="6">
                                                            <select name="blood_group" id="blood_group" class="form-control" required>
                                                                <option value="{{ $studentDB->blood_group }}" selected>{{ $studentDB->blood_group }}</option>
                                                                <option value="a+">A+</option>
                                                                <option value="a-">A-</option>
                                                                <option value="b+">B+</option>
                                                                <option value="b-">B-</option>
                                                                <option value="o+">O+</option>
                                                                <option value="o-">O-</option>
                                                                <option value="ab+">AB+</option>
                                                                <option value="ab-">AB-</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>Category</td>
                                                        <td colspan="6">
                                                            <select name="category" id="category" class="form-control" required>
                                                                <option value="{{ $studentDB->category }}" selected>{{ $studentDB->category }}</option>
                                                                <option value="general">General</option>
                                                                <option value="sc">SC</option>
                                                                <option value="st">ST</option>
                                                                <option value="obc">OBC</option>
                                                                <option value="tfw">TFW</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>Hostel</td>
                                                        <td colspan="6">
                                                            <select name="residential_status" id="residential_status" class="form-control" required>
                                                                <option value="{{ $studentDB->residential_status }}" selected>{{ $studentDB->residential_status }}</option>
                                                                <option value="nonResident" >Non-Resident</option>
                                                                <option value="y">Yes</option>
                                                                <option value="n">No</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>Religion</td>
                                                        <td colspan="6">
                                                            <select name="religion" id="religion" class="form-control" required>
                                                                    <option value="{{ $studentDB->religion }}" selected>{{ $studentDB->religion }}</option>
                                                                    <option value="Hindu">Hindu</option>
                                                                    <option value="Muslim">Muslim</option>
                                                                    <option value="Christian">Christian</option>
                                                                    <option value="Sikh">Sikh</option>
                                                                    <option value="Jain">Jain</option>
                                                                    <option value="Buddhist">Buddhist</option>
                                                                    <option value="Parsi">Parsi</option>
                                                                    <option value="Jew">Jew</option>
                                                                    <option value="Others">Others</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>Whether Minority</td>
                                                        <td colspan="6">
                                                            <select name="is_minority" id="is_minority" class="form-control" required>
                                                                <option value="{{ $studentDB->is_minority }}" selected>{{ $studentDB->is_minority }}</option>
                                                                <option value="no">No</option>
                                                                <option value="yes">Yes</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                  </fieldset>
                                </form >
                            

                            </div>
<!--Form is here -->

                            <div id="step-2">
                               
                                <form class="" id="form2" action="{{ url('/student/form_submit_2') }}" method="post">
                                    @csrf
                                    <fieldset id="f2">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr><th colspan="6" class="text-center">Academic Details</th></tr>
                                                <th>Examination</th>
                                                <th>Institute</th>
                                                <th>Medium of Instruction</th>
                                                <th>Division</th>
                                                <th>Percentage</th>
                                                <th>Board</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Matriculation/SSC </td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="ssc_school_name" value="{{ $academicDB->ssc_school_name }}" id="ssc_school_name" class="form-control" required>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <select name="ssc_medium" id="ssc_medium" class="form-control" required>
                                                                <option value="{{ $academicDB->ssc_medium }}" selected>{{ $academicDB->ssc_medium }}</option>
                                                                <option value="English" >English</option>
                                                                <option value="Bengali">Bengali</option>
                                                                <option value="Hindi">Hindi</option>
                                                                <option value="Others">Others</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <select name="ssc_division" id="ssc_division" class="form-control" required>
                                                                <option value="{{ $academicDB->ssc_division }}" selected>{{ $academicDB->ssc_division }}<option>
                                                                <option value="I" >I</option>
                                                                <option value="II">II</option>
                                                                <option value="III">III</option>
                                                                <option value="p">P</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_percentage" value="{{ $academicDB->ssc_percentage }}" id="ssc_percentage" class="form-control" required>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="ssc_board" id="ssc_board" value="{{ $academicDB->ssc_board }}" class="form-control" required>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>10+2 or Equivalent</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="hs_school_name" value="{{ $academicDB->hs_school_name }}" id="hs_school_name" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <select name="hs_medium" id="hs_medium" class="form-control">
                                                                <option value="{{ $academicDB->hs_medium }}" selected>{{ $academicDB->hs_medium }}</option>
                                                                <option value="english" >English</option>
                                                                <option value="bengali">Bengali</option>
                                                                <option value="Hindi">Hindi</option>
                                                                <option value="others">Others</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <select name="hs_divison" id="hs_divison" class="form-control">
                                                                <option value="{{ $academicDB->hs_division }}" selected>{{ $academicDB->hs_division }}</option>
                                                                <option value="I">I</option>
                                                                <option value="II">II</option>
                                                                <option value="III">III</option>
                                                                <option value="P">P</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_percentage" value="{{ $academicDB->hs_percentage }}" id="hs_percentage" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="hs_board" value="{{ $academicDB->hs_board }}" id="hs_board" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr id="dip">
                                                    <div class="form-group">
                                                        <td>
                                                        Diploma
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="diploma_college_name" value="{{ $academicDB->diploma_college_name }}" id="diploma_college_name" placeholder="(If Applicable)" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <select name="diploma_medium" id="diploma_medium" class="form-control">
                                                                <option value="{{ $academicDB->diploma_medium }}" selected>{{ $academicDB->diploma_medium }}</option>
                                                                <option value="english" >English</option>
                                                                <option value="bengali">Bengali</option>
                                                                <option value="Hindi">Hindi</option>
                                                                <option value="others">Others</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <select name="diploma_division" id="diploma_division" class="form-control">
                                                                <option value="{{ $academicDB->diploma_division }}" selected>{{ $academicDB->diploma_division }}</option>
                                                                <option value="I" >I</option>
                                                                <option value="II">II</option>
                                                                <option value="III">III</option>
                                                                <option value="P">P</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="diploma_percentage" value="{{ $academicDB->diploma_percentage }}" id="diploma_percentage" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="diploma_board" value="{{ $academicDB->diploma_board }}" id="diploma_board" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr id="grad">
                                                        <div class="form-group">
                                                                <td>
                                                                    Graduation
                                                                </td>
                                                            </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="grad_college_name" value="{{ $academicDB->grad_college_name }}" id="grad_college_name" placeholder="(If Applicable)" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <select name="grad_medium" id="grad_medium" class="form-control">
                                                                <option value="{{ $academicDB->grad_medium }}" selected>{{ $academicDB->grad_medium }}</option>
                                                                <option value="english">English</option>
                                                                <option value="bengali">Bengali</option>
                                                                <option value="Hindi">Hindi</option>
                                                                <option value="others">Others</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <select name="grad_division" id="grad_division" class="form-control">
                                                                <option value="{{ $academicDB->grad_division }}" selected>{{ $academicDB->grad_division }}</option>
                                                                <option value="I" >I</option>
                                                                <option value="II">II</option>
                                                                <option value="III">III</option>
                                                                <option value="p">P</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="grad_percentage" value="{{ $academicDB->grad_percentage }}" value="$academicDB->grad_percentage" id="grad_percentage" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="grad_board" value="{{ $academicDB->grad_board }}" id="grad_board" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr id="btek">
                                                    <div class="form-group">
                                                        <td>
                                                            B.Tech
                                                        </td>
                                                        </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="btech_college_name" value="{{ $academicDB->btech_college_name }}" id="btech_college_name" placeholder="(If Applicable)" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <select name="btech_medium" id="btech_medium" class="form-control">
                                                                <option value="{{ $academicDB->btech_medium }}" selected>{{ $academicDB->btech_medium }}<option>
                                                                <option value="english" >English</option>
                                                                <option value="bengali">Bengali</option>
                                                                <option value="Hindi">Hindi</option>
                                                                <option value="others">Others</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <select name="btech_division" id="btech_division" class="form-control">
                                                                <option value="{{ $academicDB->btech_division }}" >{{ $academicDB->btech_division }}</option>
                                                                <option value="I" >I</option>
                                                                <option value="II">II</option>
                                                                <option value="III">III</option>
                                                                <option value="P">P</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="btech_percentage" value="{{ $academicDB->btech_percentage }}" id="btech_percentage" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="btech_board" value="{{ $academicDB->btech_board }}" id="btech_board" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th colspan="3" class="text-center">Subject Wise Marks Details (Matriculation/SSC) [Write all subject including Addl.]</th>                                                                    </th>
                                                </tr>
                                                <th>Subject</th>
                                                <th>Total Marks</th>
                                                <th>Marks Obtained</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="ssc_sub_name_1" value="{{ $sscDB->ssc_sub_name_1 }}" id="ssc_sub_name_1" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_total_1" value="{{ $sscDB->ssc_sub_total_1}}"id="ssc_sub_total_1" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_marks_1" value="{{ $sscDB->ssc_sub_marks_1}}"id="ssc_sub_marks_1" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="ssc_sub_name_2" value="{{ $sscDB->ssc_sub_name_2 }}"  id="ssc_sub_name_2" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_total_2" value="{{ $sscDB->ssc_sub_total_2}}"id="ssc_sub_total_2" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_marks_2" value="{{ $sscDB->ssc_sub_marks_2}}"id="ssc_sub_marks_2" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="ssc_sub_name_3" value="{{ $sscDB->ssc_sub_name_3 }}"  id="ssc_sub_name_3" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_total_3" value="{{ $sscDB->ssc_sub_total_3}}" id="ssc_sub_total_3" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_marks_3" value="{{ $sscDB->ssc_sub_marks_3}}" id="ssc_sub_marks_3" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="ssc_sub_name_4" value="{{ $sscDB->ssc_sub_name_4 }}" id="ssc_sub_name_4" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_total_4" value="{{ $sscDB->ssc_sub_total_4}}" id="ssc_sub_total_4" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_marks_4" value="{{ $sscDB->ssc_sub_marks_4}}" id="ssc_sub_marks_4" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="ssc_sub_name_5" value="{{ $sscDB->ssc_sub_name_5 }}"  id="ssc_sub_name_5" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_total_5" value="{{ $sscDB->ssc_sub_total_5}}"id="ssc_sub_total_5" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_marks_5" value="{{ $sscDB->ssc_sub_marks_5}}"id="ssc_sub_marks_5" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="ssc_sub_name_6" value="{{ $sscDB->ssc_sub_name_6 }}"  id="ssc_sub_name_6" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_total_6" value="{{ $sscDB->ssc_sub_total_6}}" id="ssc_sub_total_6" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_marks_6" value="{{ $sscDB->ssc_sub_marks_6}}" id="ssc_sub_marks_6" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="ssc_sub_name_7" value="{{ $sscDB->ssc_sub_name_7 }}"  id="ssc_sub_name_7" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_total_7" value="{{ $sscDB->ssc_sub_total_7}}"  id="ssc_sub_total_7" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_marks_7" value="{{ $sscDB->ssc_sub_marks_7}}"  id="ssc_sub_marks_7" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="ssc_sub_name_8" value="{{ $sscDB->ssc_sub_name_8 }}"  id="ssc_sub_name_8" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_total_8" value="{{ $sscDB->ssc_sub_total_8}}" id="ssc_sub_total_8"  class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_marks_8" value="{{ $sscDB->ssc_sub_marks_8}}"id="ssc_sub_marks_8" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="ssc_sub_name_9" value="{{ $sscDB->ssc_sub_name_9 }}"  id="ssc_sub_name_9" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_total_9" value="{{ $sscDB->ssc_sub_total_9}}"  id="ssc_sub_total_9" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_marks_9" value="{{ $sscDB->ssc_sub_marks_9}}"id="ssc_sub_marks_9" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th colspan="3" class="text-center">Subject Wise Marks Details (10+2 or Equivalent Examination) [Write all subject
                                                        including Addl.]</th>
                                                    </th>
                                                </tr>
                                                <th>Subject</th>
                                                <th>Total Marks</th>
                                                <th>Marks Obtained</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="hs_sub_name_1" value="{{ $sscDB->hs_sub_name_1}}" id="hs_sub_name_1" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_total_1" value="{{ $sscDB->hs_sub_total_1}}" id="hs_sub_total_1" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_marks_1" value="{{ $sscDB->hs_sub_marks_1}}" id="hs_sub_marks_1" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="hs_sub_name_2" value="{{ $sscDB->hs_sub_name_2}}" id="hs_sub_name_2" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_total_2" value="{{ $sscDB->hs_sub_total_2}}" id="hs_sub_total_2" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_marks_2" value="{{ $sscDB->hs_sub_marks_2}}" id="hs_sub_marks_2" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="hs_sub_name_3" value="{{ $sscDB->hs_sub_name_3}}" id="hs_sub_name_3" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_total_3" value="{{ $sscDB->hs_sub_total_3}}" id="hs_sub_total_3" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_marks_3" value="{{ $sscDB->hs_sub_marks_3}}" id="hs_sub_marks_3" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="hs_sub_name_4" value="{{ $sscDB->hs_sub_name_4}}" id="hs_sub_name_4" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_total_4" value="{{ $sscDB->hs_sub_total_4}}" id="hs_sub_total_4" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_marks_4" value="{{ $sscDB->hs_sub_marks_4}}" id="hs_sub_marks_4" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="hs_sub_name_5" value="{{ $sscDB->hs_sub_name_5}}" id="hs_sub_name_5" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_total_5" value="{{ $sscDB->hs_sub_total_5}}" id="hs_sub_total_5" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_marks_5" value="{{ $sscDB->hs_sub_marks_5}}" id="hs_sub_marks_5" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="hs_sub_name_6" value="{{ $sscDB->hs_sub_name_6}}" id="hs_sub_name_6" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_total_6" value="{{ $sscDB->hs_sub_total_6}}" id="hs_sub_total_6" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_marks_6" value="{{ $sscDB->hs_sub_marks_6}}" id="hs_sub_marks_6" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="hs_sub_name_7" value="{{ $sscDB->hs_sub_name_7}}" id="hs_sub_name_7" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_total_7" value="{{ $sscDB->hs_sub_total_7}}" id="hs_sub_total_7" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_marks_7" value="{{ $sscDB->hs_sub_marks_7}}" id="hs_sub_marks_7" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="hs_sub_name_8" value="{{ $sscDB->hs_sub_name_8}}" id="hs_sub_name_8" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_total_8" value="{{ $sscDB->hs_sub_total_8}}" id="hs_sub_total_8" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_marks_8" value="{{ $sscDB->hs_sub_marks_8}}" id="hs_sub_marks_8" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="hs_sub_name_9" value="{{ $sscDB->hs_sub_name_9}}" id="hs_sub_name_9" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_total_9" value="{{ $sscDB->hs_sub_total_9}}" id="hs_sub_total_9" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_marks_9" value="{{ $sscDB->hs_sub_marks_9}}" id="hs_sub_marks_9" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th colspan="2" class="text-center">PCM Total</th>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Total Marks Obtained in PCM</td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="pcm_total_marks" value="{{ $sscDB->pcm_total_marks}}"  id="pcm_total_marks" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th colspan="3" class="text-center">Academic Year Gap</th>
                                                    </th>
                                                </tr>
                                                <th>Examinations</th>
                                                <th>Year of Joining</th>
                                                <th>Year of Passing</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Matriculation</td>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="ssc_year_of_join" value="{{$yeargapDB->ssc_year_of_join}}" id="ssc_year_of_join" class="form-control">
                                                            </td>
                                                        </div>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="ssc_year_of_pass" value="{{$yeargapDB->ssc_year_of_pass}}" id="ssc_year_of_pass" class="form-control">
                                                            </td>
                                                        </div>
                                                    </tr>
                                                    <tr>
                                                        <td>Class XI</td>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="eleven_year_of_join" value="{{$yeargapDB->eleven_year_of_join}}" id="eleven_year_of_join" class="form-control">
                                                            </td>
                                                        </div>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="eleven_year_of_pass" value="{{$yeargapDB->eleven_year_of_pass}}" id="eleven_year_of_pass" class="form-control">
                                                            </td>
                                                        </div>
                                                    </tr>
                                                    <tr>
                                                        <td>Class XII</td>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="hs_year_of_join" value="{{$yeargapDB->hs_year_of_join}}" id="hs_year_of_join" class="form-control">
                                                            </td>
                                                        </div>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="hs_year_of_pass" value="{{$yeargapDB->hs_year_of_pass}}" id="hs_year_of_pass" class="form-control">
                                                            </td>
                                                        </div>
                                                    </tr>
                                                    <tr>
                                                        <td>Diploma</td>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="diploma_year_of_join" value="{{$yeargapDB->diploma_year_of_join}}" id="diploma_year_of_join" class="form-control">
                                                            </td>
                                                        </div>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="diploma_year_of_pass" value="{{$yeargapDB->diploma_year_of_pass}}" id="diploma_year_of_pass" class="form-control">
                                                            </td>
                                                        </div>
                                                    </tr>
                                                    <tr>
                                                        <td>Graduation</td>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="grad_year_of_join" value="{{$yeargapDB->grad_year_of_join}}" id="grad_year_of_join" class="form-control">
                                                            </td>
                                                        </div>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="grad_year_of_pass"  value="{{$yeargapDB->grad_year_of_pass}}" id="grad_year_of_pass" class="form-control">
                                                            </td>
                                                        </div>
                                                    </tr>
                                                    <tr>
                                                        <td>MCA</td>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="mca_year_of_join" value="{{$yeargapDB->mca_year_of_join}}" id="mca_year_of_join" class="form-control">
                                                            </td>
                                                        </div>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="mca_year_of_pass" value="{{$yeargapDB->mca_year_of_pass}}" id="mca_year_of_pass" class="form-control">
                                                            </td>
                                                        </div>
                                                    </tr>
                                                    <tr>
                                                        <td>B.Tech</td>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="btech_year_of_join" value="{{$yeargapDB->btech_year_of_join}}" id="btech_year_of_join" class="form-control">
                                                            </td>
                                                        </div>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="btech_year_of_pass" value="{{$yeargapDB->btech_year_of_pass}}" id="btech_year_of_pass" class="form-control">
                                                            </td>
                                                        </div>
                                                    </tr>
                                                    <tr>
                                                        <td>M.Tech</td>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="mtech_year_of_join" value="{{$yeargapDB->mtech_year_of_join}}" id="mtech_year_of_join" class="form-control">
                                                            </td>
                                                        </div>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="mtech_year_of_pass" value="{{$yeargapDB->mtech_year_of_pass}}" id="mtech_year_of_pass" class="form-control">
                                                            </td>
                                                        </div>
                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </fieldset>
                              </form >
                            </div>
<!--Form is here -->
                            <div id="step-3">
                                <form class=""  id="form3" action="{{ url('/student/form_submit_3') }}" method="post">
                                    @csrf
                                    <fieldset id="f3">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th colspan="6" class="text-center">Family Background</th>
                                                    </th>
                                                </tr>
                                                <th>Particulars</th>
                                                <th>Name</th>
                                                <th>Age</th>
                                                <th>Qualification</th>
                                                <th>Occupation</th>
                                                <th>Organisation</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Father</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="father_name" value="{{$studentDB->father_name}}" id="father_name" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="father_age" value="{{$studentDB->father_age}}" id="father_age" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <select name="father_qualification"  id="father_qualification" class="form-control">
																<option value="{{$studentDB->father_qualification}}" selected>{{$studentDB->father_qualification}}</option>
                                                                <option value="nonMetric" >Non-Metric</option>
                                                                <option value="metric">Metric</option>
                                                                <option value="10+2">10+2</option>
                                                                <option value="graduate">Graduate</option>
                                                                <option value="pGraduate">Post Graduate</option>
                                                                <option value="phd">PhD</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="father_occupation" value="{{$studentDB->father_occupation}}" id="father_occupation" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="father_org" value="{{$studentDB->father_org}}" id="father_org" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Mother</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="mother_name" value="{{$studentDB->mother_name}}" id="mother_name" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="mother_age" value="{{$studentDB->mother_age}}" id="mother_age" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <select name="mother_qualification"  id="mother_qualification" class="form-control">
																<option value="{{$studentDB->mother_qualification}}" selected>{{$studentDB->mother_qualification}}</option>
                                                                <option value="nonMetric" >Non-Metric</option>
                                                                <option value="metric">Metric</option>
                                                                <option value="10+2">10+2</option>
                                                                <option value="graduate">Graduate</option>
                                                                <option value="pGraduate">Post Graduate</option>
                                                                <option value="phd">PhD</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="mother_occupation" value="{{$studentDB->mother_occupation}}"id="mother_occupation" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="mother_org" value="{{$studentDB->mother_org}}" id="mother_org" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Guardian (If Applicable)</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="guardian_name" value="{{$studentDB->guardian_name}}" id="guardian_name" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="guardian_age" value="{{$studentDB->guardian_age}}" id="guardian_age" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <select name="guardian_qualification"  id="guardian_qualification" class="form-control">
																<option value="{{$studentDB->guardian_qualification}}" selected>{{$studentDB->guardian_qualification}}</option>
                                                                <option value="nonMetric">Non-Metric</option>
                                                                <option value="metric">Metric</option>
                                                                <option value="10+2">10+2</option>
                                                                <option value="graduate">Graduate</option>
                                                                <option value="pGraduate">Post Graduate</option>
                                                                <option value="phd">PhD</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="guardian_occupation" value="{{$studentDB->guardian_occupation}}"id="guardian_occupation" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="guardian_org" id="guardian_org" value="{{$studentDB->guardian_org}}"class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                  </fieldset>
                                </form >  
                            </div>

<!--Form is here -->
                            <div id="step-4">
                                <form class=""  id="form4" action="{{ url('/student/form_submit_4') }}" method="post">
                                    @csrf
                                    <fieldset id="f4">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th colspan="2" class="text-center">Contact Details</th>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Permanent Address</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="permanent_add" value="{{$studentDB->permanent_add}}" id="permanent_add" class="form-control" required>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Present Address</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="present_add" value="{{$studentDB->present_add}}" id="present_add" class="form-control" required>
                                                        </td>
                                                    </div>
                                                </tr>
                                                
                                                <tr>
                                                    <td>Present City</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="present_city" value="{{$studentDB->present_city}}" id="present_city" class="form-control" required>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Pin No</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="pin_no" value="{{$studentDB->pin_no}}" id="pin_no" class="form-control" required>
                                                        </td>
                                                    </div>
                                                </tr>

                                                <tr>
                                                    <td>Telephone No (If Any)</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number"  name="telephone_no" value="{{$studentDB->telephone_no}}" id="telephone_no" class="form-control" placeholder="With STD Code">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Guardian's Mobile No 1</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="guardian_1_contact" value="{{$studentDB->guardian_1_contact}}" id="guardian_1_contact" class="form-control" required>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Guardian's Mobile No 2</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="guardian_2_contact" value="{{$studentDB->guardian_2_contact}}" id="guardian_2_contact" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Student's Mobile No</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="stu_mobile1_no" value="{{$studentDB->stu_mobile1_no}}" id="stu_mobile1_no" class="form-control" required>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Student's Mobile No (Alternate)</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="stu_mobile2_no" value="{{$studentDB->stu_mobile2_no}}" id="stu_mobile2_no" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>

                                                <tr>
                                                    <td>Email ID</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="email" name="alt_mail_id" value="{{$studentDB->alt_mail_id}}" id="alt_mail_id" class="form-control" required>
                                                        </td>
                                                    </div>
                                                </tr>
                                                
                                                <tr>
                                                    <td>AOTmail ID</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="email" name="aot_mail_id" value="{{$studentDB->aot_mail_id}}" id="aot_mail_id" class="form-control" placeholder="If generated by AOT">
                                                        </td>
                                                    </div>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </fieldset>
                             </form>
                            </div>

<!--Form is here -->                         
                            <div id="step-5">
                                <form class="" id="form5" action="{{ url('/student/form_submit_5') }}" method="post" enctype="multipart/form-data">{{ csrf_field() }}
                                
                                    <fieldset id="f5">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th colspan="2" class="text-center">Other Details</th>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Annual Family Income</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="family_income"  value="{{$studentDB->family_income}}" id="family_income" class="form-control" required>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Scholarship Received</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="is_scholar" value="{{$studentDB->is_scholar}}" id="is_scholar" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Aadhaar Number</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="aadhar_no" value="{{$studentDB->aadhar_no}}"  id="aadhar_no" class="form-control" required>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Voter ID Card No</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="voter_no" value="{{$studentDB->voter_no}}" id="voter_no" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>PAN Card No</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="pan_no" value="{{$studentDB->pan_no}}" id="pan_no" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Passport No</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="passport_no" value="{{$studentDB->passport_no}}" id="passport_no" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Languages Known</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="lang_known" value="{{$studentDB->lang_known}}" id="lang_known" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                   <td>Migration/Transfer</td>
                                                   <div class="form-group">
                                                        <td>
                                                            <select name="is_migrate" id="is_migrate" class="form-control">
																<option value="{{$studentDB->is_migrate}}" selected>{{$studentDB->is_migrate}}</option>
                                                                <option value="yes" >Yes</option>
                                                                <option value="no">No</option>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Migration Institute</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" value="{{$studentDB->mi_institute}}"  name="mi_institute" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Migration Session</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="mi_session" value="{{$studentDB->mi_session}}" id="mi_session" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Migration University</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="mi_university" value="{{$studentDB->mi_university}}" id="mi_university" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Additional Information</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="additional_info" value="{{$studentDB->additional_info}}" id="additional_info" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th colspan="2" class="text-center">Student's Photo</th>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Upload Photo </td>
                                                    <td>
                                                    <div class="form-group">
                                                        
                                                            <input  type="file" name="avatar" id="avatar"  aria-describedby="fileHelp" >
                                                            <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                                                             <span class="input-group-btn">
                                                            </span>
                                                        <!-- user database   -->
                                                    </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th colspan="2" class="text-center">Declaration</th>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <div class="form-group">
                                                        <td >
                                                            <input type="checkbox" name="agree" id="agree" value="agree" >
                                                        </td>
                                                </div>
                                                    <td>I do hereby affirm and declare that the above information are true and correct to the best of my knowledge and belief and nothing has been cancelled there from. I also know that in the event of wrong information my candidature may liable to be cancelled.</td>
                                                   
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                    </fieldset>
                                </form >
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</body>

@endsection