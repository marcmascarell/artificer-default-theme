<!-- Logo -->
<a href="{{ URL::route('admin.home') }}" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini">
    A
  </span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg">
    {{ $appTitle }}
  </span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>

  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <li class="text-center">
        <a href="{{ URL::route('admin.logout') }}">
          <i class="fa fa-sign-out"></i>
          {{ ucfirst(Lang::trans('admin::general.logout')) }}
        </a>
      </li>
    </ul>
  </div>
</nav>