@extends('admission.layout.mainlayout') 
@section('content')

<script type="text/javascript">

var step = 1;

function nextCallback() {
	
    alert(document.getElementById("edit").value);
    var id = '#form' + step;
    var path = $(id)[0].action;
    alert(id+" "+path);
	
    $(id).submit(function(e){
        e.preventDefault();

        $.ajax({
            
            type: 'POST',
            url: path,
            data: $(id).serialize(),
            success: function(data) {
                alert("Thank you for subscribing!");
            },
            error: function(x, e) {
                alert(x.status+" "+e);
            }
        });
        return false;
    });
    $(id).submit();

    step++;
    if(document.getElementById('edit').value === '0'){
        document.getElementById('f'+step).disabled = true;
    }
    else
        document.getElementById('f'+step).disabled = false;
}

function previousCallback() {
	step--;
}

function finishCallback() {
    alert("hi");
}

function fun(exam_type)
{
    if(exam_type=="jelet" || exam_type=='open')
        document.getElementById('lateral_div').style.display='block';
    else
        document.getElementById('lateral_div').style.display='none';
}

</script>

<style>
input[type=text]{
    text-transform:uppercase;
}
</style>
<input type="text" value="{{ $edit }}" id="edit" >
<div class="right_col" role="main" style="min-height: initial!important;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Fill Out The Form Carefully</h3>
                
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
                                    <a href="#step-1">
                                        <span class="step_no">1</span>
                                        <span class="step_descr">
                                            Step 1<br />
                                            <small>Personal/General Details</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-2">
                                        <span class="step_no">2</span>
                                        <span class="step_descr">
                                            Step 2<br />
                                            <small>Academic Details</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-3">
                                        <span class="step_no">3</span>
                                        <span class="step_descr">
                                            Step 3<br />
                                            <small>Family Details</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-4">
                                        <span class="step_no">4</span>
                                        <span class="step_descr">
                                            Step 4<br />
                                            <small>Contact Details</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-5">
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
                                
                                <form class="" action="{{ url('/admission/form_submit_1') }}" id="form1">
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
                                                        <td colspan="6"><input type="text" name="name" id="name" placeholder="Enter Full Name" class="form-control" required></td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>Year of Admission/Re-Admission</td>
                                                        <td>
                                                            <select name="year_of_admission" id="year_of_admission"  class="form-control" required>
                                                            <option value="" disabled selected>- select -</option>
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
                                                            <select name="is_readmission" class="form-control" required>
                                                            <option value="" disabled selected>- select -</option>
                                                                <option value="n">No</option>
                                                                <option value="y">Yes</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>Actual Year of Admission</td>
                                                        <td colspan="2">
                                                            <select name="actual_year_of_admission" class="form-control" required>
                                                            <option value="" disabled selected>- select -</option>
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
                                                            <input type="text" name="enrollment_no" placeholder="Enrollment No" class="form-control" required>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>Entrance Type</td>
                                                        <td>
                                                            <select name="rank_type" id="rank_type" onchange="fun(this.value)" class="form-control" required>
                                                                <option value="" disabled selected>- select -</option>
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
                                                            <input type="number" name="rank" class="form-control" placeholder="Rank" required>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>TFW</td>
                                                        <td>
                                                            <select name="is_tfw" class="form-control" required>
                                                            <option value="" disabled selected>- select -</option>
                                                                <option value="n">No</option>
                                                                <option value="y">Yes</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>Discipline</td>
                                                        <td colspan="2">
                                                            <select name="discipline" class="form-control" required>
                                                                <option value="" disabled selected>- select -</option>
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
                                                            <select name="is_lateral" id="lateral_div"  class="form-control" required>
                                                                <option value="" disabled selected>- select -</option>
                                                                <option value="n" >No</option>
                                                                <option value="y">Yes</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>Date of Birth</td>
                                                        <td colspan="6">
                                                            <input type="text" name="dob"  class="form-control" value="" required/>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>Place of Birth</td>
                                                        <td colspan="2">
                                                            <input type="text" name="place_of_birth" placeholder="Enter Full Address" class="form-control" required>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>District</td>
                                                        <td>
                                                            <input type="text" name="district" placeholder="district name" class="form-control"  required>
                                                        </td>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <td>State</td>
                                                        <td>
                                                            <select name="state" class="form-control" required>
                                                                <option value="" disabled selected>- select -</option>
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
                                                            <select name="nationality" class="form-control" required>
                                                                <option value="" disabled selected>- select -</option>
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
                                                            <select name="sex" class="form-control" required>
                                                                <option value="" disabled selected>- select -</option>
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
                                                            <select name="blood_group" class="form-control" required>
                                                                <option value="" disabled selected>- select -</option>
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
                                                            <select name="category" class="form-control" required>
                                                                <option value="" disabled selected>- select -</option>
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
                                                            <select name="residential_status" class="form-control" required>
                                                                <option value="" disabled selected>- select -</option>
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
                                                            <select name="religion" class="form-control" required>
                                                                    <option value="" disabled selected>- select -</option>
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
                                                            <select name="is_minority" class="form-control" required>
                                                                <option value="" disabled selected>- select -</option>
                                                                <option value="n">No</option>
                                                                <option value="y">Yes</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <input type="submit">
                                  </fieldset>
                                </form >
                            

                            </div>
<!--Form is here -->

                            <div id="step-2">
                               
                                <form class="" id="form2" action="{{ url('/admission/form_submit_2') }}" method="post">
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
                                                    <td>Matriculation/SSC</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="ssc_school_name" id="ssc_school_name" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <select name="ssc_medium" class="form-control">
                                                                <option value="English" selected>English</option>
                                                                <option value="Bengali">Bengali</option>
                                                                <option value="Hindi">Hindi</option>
                                                                <option value="Others">Others</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <select name="ssc_divison" class="form-control">
                                                                <option value="i" selected>I</option>
                                                                <option value="ii">II</option>
                                                                <option value="iii">III</option>
                                                                <option value="p">P</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_percentage" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="ssc_board" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>10+2 or Equivalent</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="hs_school_name" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <select name="hs_medium" class="form-control">
                                                                <option value="english" selected>English</option>
                                                                <option value="bengali">Bengali</option>
                                                                <option value="Hindi">Hindi</option>
                                                                <option value="others">Others</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <select name="hs_divison" class="form-control">
                                                                <option value="i" selected>I</option>
                                                                <option value="ii">II</option>
                                                                <option value="iii">III</option>
                                                                <option value="p">P</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_percentage" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="hs_board" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                        Diploma
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="diploma_college_name" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <select name="diploma_medium" class="form-control">
                                                                <option value="english" selected>English</option>
                                                                <option value="bengali">Bengali</option>
                                                                <option value="Hindi">Hindi</option>
                                                                <option value="others">Others</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <select name="diploma_divison" class="form-control">
                                                                <option value="i" selected>I</option>
                                                                <option value="ii">II</option>
                                                                <option value="iii">III</option>
                                                                <option value="p">P</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="diploma_percentage" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="diploma_board" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                        <div class="form-group">
                                                                <td>
                                                                    Graduation
                                                                </td>
                                                            </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="grad_college_name" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <select name="grad_medium" class="form-control">
                                                                <option value="english" selected>English</option>
                                                                <option value="bengali">Bengali</option>
                                                                <option value="Hindi">Hindi</option>
                                                                <option value="others">Others</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <select name="grad_divison" class="form-control">
                                                                <option value="i" selected>I</option>
                                                                <option value="ii">II</option>
                                                                <option value="iii">III</option>
                                                                <option value="p">P</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="grad_percentage" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="grad_board" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            B.Tech
                                                        </td>
                                                        </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="btech_college_name" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <select name="btech_medium" class="form-control">
                                                                <option value="english" selected>English</option>
                                                                <option value="bengali">Bengali</option>
                                                                <option value="Hindi">Hindi</option>
                                                                <option value="others">Others</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <select name="btech_divison" class="form-control">
                                                                <option value="i" selected>I</option>
                                                                <option value="ii">II</option>
                                                                <option value="iii">III</option>
                                                                <option value="p">P</option>
                                                            </select>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="btech_percentage" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="btech_board" class="form-control">
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
                                                            <input type="text" name="ssc_sub_name_1" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_total_1" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_marks_1" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="ssc_sub_name_2" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_total_2" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_marks_2" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="ssc_sub_name_3" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_total_3" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_marks_3" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="ssc_sub_name_4" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_total_4" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_marks_4" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="ssc_sub_name_5" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_total_5" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_marks_5" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="ssc_sub_name_6" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_total_6" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_marks-6" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="ssc_sub_name_7" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_total_7" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_marks_7" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="ssc_sub_name_8" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_total_8" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_marks_8" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="ssc_sub_name_9" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_total_9" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="ssc_sub_marks_9" class="form-control">
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
                                                            <input type="text" name="hs_sub_name_1" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_total_1" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_marks_1" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="hs_sub_name_2" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_total_2" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_marks_2" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="hs_sub_name_3" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_total_3" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_marks_3" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="hs_sub_name_4" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_total_4" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_marks_4" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="hs_sub_name_5" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_total_5" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_marks_5" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="hs_sub_name_6" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_total_6" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_marks_6" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="hs_sub_name_7" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_total_7" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_marks_7" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="hs_sub_name_8" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_total_8" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_marks_8" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="hs_sub_name_9" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_total_9" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="hs_sub_marks_9" class="form-control">
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
                                                            <input type="number" name="pcm_total_marks" class="form-control">
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
                                                                <input type="number" name="ssc_year_of_join" class="form-control">
                                                            </td>
                                                        </div>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="ssc_year_of_pass" class="form-control">
                                                            </td>
                                                        </div>
                                                    </tr>
                                                    <tr>
                                                        <td>Class XI</td>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="eleven_year_of_join" class="form-control">
                                                            </td>
                                                        </div>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="eleven_year_of_pass" class="form-control">
                                                            </td>
                                                        </div>
                                                    </tr>
                                                    <tr>
                                                        <td>Class XII</td>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="hs_year_of_join" class="form-control">
                                                            </td>
                                                        </div>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="hs_year_of_pass" class="form-control">
                                                            </td>
                                                        </div>
                                                    </tr>
                                                    <tr>
                                                        <td>Diploma</td>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="diploma_year_of_join" class="form-control">
                                                            </td>
                                                        </div>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="diploma_year_of_pass" class="form-control">
                                                            </td>
                                                        </div>
                                                    </tr>
                                                    <tr>
                                                        <td>Graduation</td>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="grad_year_of_join" class="form-control">
                                                            </td>
                                                        </div>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="grad_year_of_pass" class="form-control">
                                                            </td>
                                                        </div>
                                                    </tr>
                                                    <tr>
                                                        <td>MCA</td>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="mca_year_of_join" class="form-control">
                                                            </td>
                                                        </div>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="mca_year_of_pass" class="form-control">
                                                            </td>
                                                        </div>
                                                    </tr>
                                                    <tr>
                                                        <td>B.Tech</td>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="btech_year_of_join" class="form-control">
                                                            </td>
                                                        </div>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="btech_year_of_pass" class="form-control">
                                                            </td>
                                                        </div>
                                                    </tr>
                                                    <tr>
                                                        <td>M.Tech</td>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="mtech_year_of_join" class="form-control">
                                                            </td>
                                                        </div>
                                                        <div class="form-group">
                                                            <td>
                                                                <input type="number" name="mtech_year_of_pass" class="form-control">
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
                                <form class=""  id="form3" action="{{ url('/admission/form_submit_3') }}" method="post">
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
                                                            <input type="text" name="father_name" id="father_name" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="father_age" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <select name="father_qualification" class="form-control">
                                                                <option value="nonMetric" selected>Non-Metric</option>
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
                                                            <input type="text" name="father_occupation" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="father_org" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Mother</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="mother_name" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="mother_age" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <select name="mother_qualification" class="form-control">
                                                                <option value="nonMetric" selected>Non-Metric</option>
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
                                                            <input type="text" name="mother_occupation" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="mother_org" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Guardian (If Applicable)</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="guardian_name" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="guardian_age" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <select name="guardian_qualification" class="form-control">
                                                                <option value="nonMetric" selected>Non-Metric</option>
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
                                                            <input type="text" name="guardian_occupation" class="form-control">
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="guardian_org" class="form-control">
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
                                <form class=""  id="form4" action="{{ url('/admission/form_submit_4') }}" method="post">
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
                                                            <input type="text" name="permanent_add" id="permanent_add" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Present Address</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="present_add" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                
                                                <tr>
                                                    <td>Present City</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="present_city" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Pin No</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="pin_no" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>

                                                <tr>
                                                    <td>Telephone No (If Any)</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="telephone_no" class="form-control" placeholder="With STD Code">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Guardian's Mobile No 1</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="guardian_1_contact" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Guardian's Mobile No 2</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="guardian_2_contact" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Student's Mobile No</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="stu_mobile1_no" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Student's Mobile No (Alternate)</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="number" name="stu_mobile2_no" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>

                                                <tr>
                                                    <td>Email ID</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="email" name="alt_mail_id" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                
                                                <tr>
                                                    <td>AOTmail ID</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="email" name="aot_mail_id" class="form-control">
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
                                <form class="" id="form5" action="{{ url('/admission/form_submit_5') }}" method="post">
                                    @csrf
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
                                                            <input type="number" name="family_income" id="family_income" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Scholarship Received</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="is_scholar" id="is_scholar" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Aadhaar Number</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="aadhar_no" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Voter ID Card No</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="voter_no" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>PAN Card No</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="pan_no" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Passport No</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="passport_no" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Languages Known</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="lang_known" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                   <td>Migration/Transfer</td>
                                                   <div class="form-group">
                                                        <td>
                                                            <select name="is_migrate" class="form-control">
                                                                <option value="yes" >Yes</option>
                                                                <option value="no" selected>No</option>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Migration Institute</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="mi_institute" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Migration Session</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="mi_session" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Migration University</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="mi_university" class="form-control">
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>Additional Information</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="text" name="additional_info" class="form-control">
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
                                                    <td>Upload Photo</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="file" name="avatar" class="form-control">
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
                                                    <th colspan="2" class="text-center">Declaration</th>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <div class="form-group">
                                                        <td>
                                                            <input type="checkbox" name="agree" class="form-control" value="agree">
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


@endsection