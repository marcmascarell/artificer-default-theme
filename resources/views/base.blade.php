<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ $appTitle }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  @if (! $standalone)
    {!! \Mascame\Artificer\Artificer::assetManager()->css() !!}
    {!! \Mascame\Artificer\Artificer::assetManager()->js() !!}
  @endif
</head>
<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">

    @section('header')
      <header class="main-header">
        @include($theme . '.partials.header')
      </header>
    @show

    @section('sidebar-left')
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        @include($theme . '.partials.sidebar-left')
      </aside>
    @show

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <section class="content-header">
          @section('content-header')
              @include($theme . '.partials.content-header')
          @show
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="notifications text-center">
              @include('flash::message')
          </div>

          @yield('content')
      </section>
      <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
    @section('footer')
      <footer class="main-footer hidden">
          <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.8
          </div>
          <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
          reserved.
        </footer>
    @show

    @section('sidebar-right')
        @include($theme . '.partials.sidebar-right')
    @show

  </div>
  <!-- ./wrapper -->

</body>
</html>
