@extends('admin.layout.mainlayout')

@section('content')


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


                            <div class="profile_title">

                                <div class="col-md-6">
                                    
                                    <div class="col-md-80 col-sm-80 col-xs-80">
                                        <div class="x_panel">
                                        <div class="x_title">
                                        </div>
                                        <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                        <th style="text-align: center;">#</th>
                                        <th style="text-align: center;">Form ID</th>
                                        <th style="text-align: center;">Registration Code</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @php {{$co=1;}}
                                            
                                            @endphp
                                            @foreach($reg as $key=>$value)
                                        <tr>
                                        <th style="text-align: center;" scope="row">{{$co}}</th>
                                        <td style="text-align: center;">{{$key}}</td>
                                        <td style="text-align: center;">{{$value}}</td>
                                        </tr>
                                        @php
                                            {{$co=$co+1;}}
                                            
                                            @endphp
                                        @endforeach
                                        </tbody>
                                        </table>
                                        </div>
                                        </div>
                                        </div>
                                        
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