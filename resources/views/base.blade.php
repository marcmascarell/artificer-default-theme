<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('vendor/admin/img/favicon.png') }}"/>

    <title>{{ $appTitle }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    {!! \Mascame\Artificer\Artificer::assetManager()->css() !!}

    @phpToJS
    @routes
</head>
<body class="hold-transition skin-blue sidebar-mini">

    <div id="app" class="wrapper">
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
        <div class="content-wrapper" :style="iframe ? 'display: flex; flex-direction: column;' : null">
            <modal></modal>

            <!-- Main content -->
            <section v-if="iframe" class="content" style="padding: 0;flex: 1; display: flex; width: 100%; flex-direction: column;">
                <iframe v-if="iframe" style="flex: 1; width: 100%; height: 100%"
                        :src="iframe"
                        frameborder="0" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" oallowfullscreen="true" msallowfullscreen="true"></iframe>
            </section>
            <section v-else class="content">
                <router-view></router-view>

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
    </div>
    <!-- ./wrapper -->

    @section('footerScripts')
        {!! \Mascame\Artificer\Artificer::assetManager()->js() !!}
    @show
</body>
</html>
