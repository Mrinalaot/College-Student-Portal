@extends('admin.layout.mainlayout')

@section('content')

<script>
function check()
{
  var password = document.getElementById("password").value;
  var password_confirm = document.getElementById("password_confirm").value;
  if(password_confirm != password)
  {
    window.alert("Password NOT matched");
    return false;
  }
  else if( password.length < 6)
  {
    window.alert("Minimum Password length is 6");
    return false;
  } 
  else
    return true;

}
</script>

   <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3> {{ Auth::user()->name }} <small> Profile</small> </h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <h2>Admin Profile Page </h2>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>{{ Auth::user()->name }} <small> profile </small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <!--Profile info here -->
                            <!--Pop up -->
                            <div class="flash-message">
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                    @if(Session::has('alert-' . $msg))
                                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                    @endif
                                @endforeach
                            </div>

                            <div class="profile_title">

                                <div class="col-md-6">
                                    <form name="form1" method="POST" class="form-horizontal form-label-left input_mask" action="{{ asset('admin/manage_staff') }}" onSubmit="return check()" >{{ csrf_field() }}
                                  
                                        <h3 style="text-align:center ;"> Please Enter new User Details </h3>
                                        
                                        <div class="col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" name="user_name" id="user_name" placeholder="User Name" required autofocus>
                                            <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-xs-12 form-group has-feedback">
                                            <input type="email" class="form-control has-feedback-left" name="email" id="email" placeholder="Email ID" requireds>
                                            <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-xs-12 form-group has-feedback">
                                            <input type="password" class="form-control has-feedback-left" name="password" id="password" placeholder="New Password" required>
                                            <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-xs-12 form-group has-feedback">
                                            <input type="password" class="form-control has-feedback-left" name="password_confirm" id="password_confirm" placeholder="Confirm Password" required>
                                            <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-xs-12 form-group has-feedback">
                                            <select name="role" id="role"  class="form-control" required>
                                            <option value="" disabled selected>- select -</option>
                                                <option value="exam">Exam</option>
                                                <option value="placement">Placement</option>
                                                <option value="admission">Admission</option>
                                                <option value="admin">Admin</option>
                                            </select>    
                                        </div>


                                        <div style="text-align:center">
                                           <input type="submit"  class="btn btn-success" value="Add Staff">
                                        </div>
 
                                        
                                    </form>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection