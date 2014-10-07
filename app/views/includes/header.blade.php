<div class="navbar navbar-default navbar-custom navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Tampilkan Menu</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ URL::to('/') }}"><img src="{{ URL::to('/') }}/assets/images/logo-base.png" height="40"></a>
    </div>
    <!-- nama situs dan menu utama (rata kiri) -->
    <div class="navbar-collapse collapse navbar-inverse-collapse" id="navbar-main">
    <!--
    @if (Auth::check())
      <ul class="nav navbar-nav">
      @foreach (Auth::user()->getEffectiveMenu() as $menu)
        @if (count($menu->_child) > 0)
          <li class="dropdown">
            <a href="{{ URL::to($menu->url) }}" class="dropdown-toggle" data-toggle="dropdown">{{ $menu->name }}<b class="caret"></b></a>
            <ul class="dropdown-menu">
            @foreach ($menu->_child as $child)
              @if (count($child->_child) > 0)
                <li class="dropdown-submenu">
                  <a href="{{ URL::to($child->url) }}" class="dropdown-toggle" data-toggle="dropdown">{{ $child->name }}</b></a>
                  <ul class="dropdown-menu">
                  @foreach ($child->_child as $grandChild)
                    <li>
                      <a href="{{ URL::to($grandChild->url) }}">{{ $grandChild->name }}</a>
                    </li>
                  @endforeach
                  </ul>
                </li>
              @else
              <li>
                <a href="{{ URL::to($child->url) }}">{{ $child->name }}</a>
              </li>
              @endif
            @endforeach
            </ul>
          </li>
        @else
          <li><a href="{{ URL::to($menu->url) }}">{{ $menu->name }}</a></li>
        @endif
      @endforeach
      </ul>
    @endif
    -->
      <!-- menu akun -->
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          @if (Auth::check())
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} - [{{ Auth::user()->username }}]<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li>
              <a href="{{ URL::to('/user/detail/' . Auth::user()->id ) }}">
              <span class="glyphicon glyphicon-user"></span> Profil
              </a>
            </li>
            <li>
              <a href="{{ URL::to('/logout') }}">
              <span class="glyphicon glyphicon-log-out"></span> Logout
              </a>
            </li>
          </ul>
          @else
          <a href="{{ URL::to('login') }}">
          <span class="glyphicon glyphicon-log-in"></span> Login
          </a>
          @endif
        </li>
      </ul>
    @if (Auth::check())
      <form action="{{ URL::to('user/change_role') }}" method="post" role="form" class="navbar-form navbar-right" style="margin-right: 1em;">
        <div class="form-group">
          <label for="group_id">Login sebagai&nbsp;&nbsp;</label>
          <select class="selecter form-control" id="group_id" name="group_id" onchange="this.form.submit()">
          @foreach (Auth::user()->group as $group)
            <option value="{{ $group->id }}" {{ $group->id == Auth::user()->getGroupRoleId() ? 'selected="selected"' : '' }} >{{ $group->name }}</option>
          @endforeach
          </select>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      </form>
    @endif
    </div>
  </div>
</div>