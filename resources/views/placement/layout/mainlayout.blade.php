<!DOCTYPE html>
<html lang="en">
  <head>
    @include('placement.layout.partials.head')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        @include('placement.layout.partials.sidebarnav')
       @include('placement.layout.partials.topnav')
    
	     @yield('content')

	     @include('placement.layout.partials.footer')

      </div>
    </div>
	
	@include('placement.layout.partials.footer-scripts')


  </body>
</html>
