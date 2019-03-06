<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
 
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title">Student Dahboard</a>
        </div>
 
        <div class="profile"><!--img_2 -->
          
            <div class="profile_pic">
                <img src="{{ asset('/storage/avatars') }}/{{ $user->avatar }}" alt="..." class="img-circle profile_img">
            </div>
            <!-- {{ $user->avatar }} -->
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->user_name }}</h2>
            </div>
        </div>
 
        <br>
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
 
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a ><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ asset('/student')}}"> Student Home</a></li>
                            <li><a href="{{ asset('/student/profile')}}">Update Profile</a></li>
                            <li><a href="{{asset('/student/change_password')}}">Change Password</a></li>
                            <li><a href="{{asset('/student/print_view')}}">Print View</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-edit"></i> Request for update <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="form_advanced.html"> Validate Form </a></li>
                            <li><a href="form_validation.html"> fix a meeting for validation </a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-table"></i> Excel View <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="tables.html">SSC HS Marks</a></li>
                            <li><a href="tables_dynamic.html">Semester Marks</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-bar-chart-o"></i> Performence <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="chartjs.html">My Performance</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>AOT </h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-mortar-board"></i> Exam Department <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="e_commerce.html">Contact</a></li>
 
                        </ul>
                    </li>
                    <li><a><i class="fa fa-trophy"></i> Placement Department <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="coming_soon.html">Contact </a></li>
 
                        </ul>
                    </li>
                    <li><a><i class="fa fa-laptop"></i> Extra Features <span class="label label-success pull-right">Coming Soon</span></a>
                    <ul class="nav child_menu">
                            <li><a href="coming_soon.html">Keep patients </a></li>
                    </li>
                </ul>
            </div>
 
        </div>
 
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
    </div>
</div>
