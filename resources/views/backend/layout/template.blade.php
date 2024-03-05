<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('backend.include.header')
   @include('backend.include.css')


  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <!-- - br-sideleft -->
    @include('backend.include.menu')

    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <!-- -- br-header -->
    @include('backend.include.topbar')

    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
   <!-- -- br-sideright -->
   @include('backend.include.rightsidebar')

    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">


      @yield('body')
      @include('backend.include.footer')

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    @include('backend.include.script')

  </body>
</html>
