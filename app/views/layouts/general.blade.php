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
    
      <!-- sidebar left -->
      <div class="col-md-3">
        @if (Auth::check())
            @include('includes.sidebar')
        @endif
      </div>

      <!-- primary -->
      <div class="col-md-9">
        @yield('content')
      </div>

    </div> <!-- .row -->

  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <br><br>
        @include('includes.footer')
      </div>
    </div>
  </div>
  @yield('custom_foot')
</body>
</html>