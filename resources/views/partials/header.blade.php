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

  {{--<section class="content-header">--}}
  {{--<h1>--}}
  {{--Extensions--}}
  {{--<small>Control panel</small>--}}
  {{--</h1>--}}

  {{--<ol class="breadcrumb" style="color: white; font-size: .8em">--}}
    {{--<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>--}}
    {{--<li class="active">Extensions</li>--}}
    {{--</ol>--}}

    {{--<ol class="breadcrumb">--}}
    {{--<li>--}}
      {{--<a href="#">--}}
      {{--<i class="{{ $icon['dashboard'] }}"></i> {{ ucfirst(Lang::trans('admin::general.dashboard')) }}--}}
      {{--</a>--}}
    {{--</li>--}}
    {{--<li>--}}
      {{--<a href="#">--}}
        {{--<i class="{{ $icon['models'] }}"></i> {{ ucfirst(Lang::trans('admin::general.models')) }}--}}
      {{--</a>--}}
    {{--</li>--}}
      {{--@if (isset($model))--}}
        {{--<li class="active">{{ $model->name }}</li>--}}
      {{--@endif--}}
    {{--</ol>--}}
  {{--</section>--}}

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