<!DOCTYPE html>
<html lang="en">
  <head>
    @include('student.layout.partials.head')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        @include('student.layout.partials.sidebarnav')
       @include('student.layout.partials.topnav')
    
	     @yield('content')

	     @include('student.layout.partials.footer')

      </div>
    </div>
	
	@include('student.layout.partials.footer-scripts')


  </body>
</html>
