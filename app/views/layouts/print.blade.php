<!DOCTYPE html>
<html>
<head>
  @include('includes.head-general')
  @yield('custom_head')
</head>
<body>
  <br><br>
  <div class="container">   
    @yield('content')
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