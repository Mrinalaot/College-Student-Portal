<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
 
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title">Admission Dahboard</a>
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
                            <li><a href="{{asset('/admission')}}">Admission Home</a></li>
                            <li><a href="{{asset('/admission/profile')}}">Update Profile</a></li>
                            <li><a href="{{asset('/admission/change_password')}}">Change Password</a></li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
            <div class="menu_section">
                <h3>AOT </h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-mortar-board"></i> Contact AOT<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="e_commerce.html">Contact Exam</a></li>
                            <li><a href="e_commerce_backend.html">Contact Admin</a></li>
 
                        </ul>
                    </li>
                    <li><a><i class="fa fa-laptop"></i> Extra Features <span class="label label-success pull-right">Coming Soon</span></a></li>
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
