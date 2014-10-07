<!DOCTYPE html>
<html>
<head>
  @include('includes.head-general')
  @yield('custom_head')
</head>
<body>
  @include('includes.header')
  <br><br>
  <div class="container">   
    <!-- content -->
    <div class="row">

      <!-- primary -->
      <div class="col-md-12">
        @yield('content')
      </div>

    </div> <!-- .row -->

  </div>
  <div class="container">
    @include('includes.footer')
  </div>
</body>
</html>