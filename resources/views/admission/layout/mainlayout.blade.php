<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admission.layout.partials.head')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        @include('admission.layout.partials.sidebarnav')
       @include('admission.layout.partials.topnav')
    
	     @yield('content')

	     @include('admission.layout.partials.footer')

      </div>
    </div>
	
	@include('admission.layout.partials.footer-scripts')


  </body>
</html>
