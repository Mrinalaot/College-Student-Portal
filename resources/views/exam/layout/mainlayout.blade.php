<!DOCTYPE html>
<html lang="en">
  <head>
    @include('exam.layout.partials.head')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        @include('exam.layout.partials.sidebarnav')
       @include('exam.layout.partials.topnav')
    
	     @yield('content')

	     @include('exam.layout.partials.footer')

      </div>
    </div>
	
	@include('exam.layout.partials.footer-scripts')


  </body>
</html>
