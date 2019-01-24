<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.layout.partials.head')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        @include('admin.layout.partials.sidebarnav')
       @include('admin.layout.partials.topnav')
    
	     @yield('content')

	     @include('admin.layout.partials.footer')

      </div>
    </div>
	
	@include('admin.layout.partials.footer-scripts')


  </body>
</html>
