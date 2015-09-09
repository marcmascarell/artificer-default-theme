<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{ $main_title }}</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        @section('head-styles')
            @include($theme . '.partials.head-styles')
            <?php Event::fire('artificer.view.head.styles'); ?>
        @show

        @section('head-scripts')
            @include($theme . '.partials.head-scripts')
            <?php Event::fire('artificer.view.head.scripts'); ?>
        @show

    </head>
    <body class="skin-blue fixed @if ($standalone) {{ "standalone" }} @else {{ "full-view" }} @endif">
        <!-- header logo: style can be found in header.less -->
        @section('header')
            <header class="header">
                @include($theme . '.partials.header')
            </header>
        @show

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->

            @section('sidebar')
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    @include($theme . '.partials.sidebar')
                </section>
                <!-- /.sidebar -->
            </aside>
            @show

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Main content -->
                <section class="content-header">
                    @include($theme . '.partials.content-header')
                </section>

                <!-- Content Header (Page header) -->
                <section class="content">
                    <div class="notifications">
                        {{ Notify::all(); }}
                    </div>

					@yield('content')
                </section><!-- /.content -->

            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
    </body>
</html>