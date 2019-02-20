
@extends('exam.layout.mainlayout')

@section('content')
              <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> {{ Auth::user()->user_name }} <small> Profile</small> </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <h2>Exam Profile Page</h2>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>{{ Auth::user()->user_name }} <small> profile </small></h2>
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
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="{{ asset('/storage/avatars') }}/{{ $user->avatar }}" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>

                      <form id='upload-form1' action="{{ url('/exam/profile') }}" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">{{ csrf_field() }}
                        <div class="form-group">
                      
                        <input type="file" name="avatar" id="avatar" aria-describedby="fileHelp">
                      
                    <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                    <span class="input-group-btn">
                    </span>
                        </div>
                       
                      </div>

                      <div class="profile_title">

                          <div class="col-md-6">

                            <!--Pop up -->
                            <div class="flash-message" id="popup">
                              @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))

                                  <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                              @endforeach
                            </div>

                            <div class="col-xs-12 form-group has-feedback">
                               <input id="name" type="text" class="form-control has-feedback-left" name="user_name" placeholder="First Name" value="{{ Auth::user()->user_name}}" required>
                                   <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="col-xs-12 form-group has-feedback">
                              <input id="email" type="email" class="form-control has-feedback-left" name="email" placeholder="email" value="{{ Auth::user()->email}}" required>
                              <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <!--
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <input type="text" class="form-control" name="surname" placeholder="Last Name">
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <input type="text" class="form-control" name="mobile" placeholder="Phone">
                              <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            -->
                            <button type="submit"  class="btn btn-success">Update</button>
                          </form>  
                        </div>
                      </div>
                    <!--/Profile info here -->  
                    </div> <!-- /div class="x-content" -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
