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
</head>
<body class="hold-transition skin-blue sidebar-mini">

<script>
    window.AppData = {
        icons: {!! json_encode($icon) !!},
        models: {!! json_encode($models) !!},
        routes: {
            store: "{{ route('admin.model.store', ['slug' => ':model'], $absolute = true) }}",
            update: "{{ route('admin.model.update', ['slug' => ':model', 'id' => ':id'], $absolute = true) }}",
            edit: "{{ route('admin.model.edit', ['slug' => ':model', 'id' => ':id'], $absolute = true) }}",
            show: "{{ route('admin.model.show', ['slug' => ':model', 'id' => ':id'], $absolute = true) }}",
            destroy: "{{ route('admin.model.destroy', ['slug' => ':model', 'id' => ':id'], $absolute = true) }}",
        },
    };

    @if (isset($fields))
        window.AppData.model = {
            fields: {!! json_encode($fields) !!},
            values: {!! json_encode($values) !!},
        };

        window.AppData.method = '{{ $formMethod ?? null }}';
        window.AppData.action = '{{ isset($formActionRoute) ? route($formActionRoute, ['slug' => $model->route, 'id' => $values->id]) : null }}';
    @endif
</script>

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
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <section class="content-header">
                <h1>
                    Extensions
                    <small>Control panel</small>
                </h1>

                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">Extensions</li>
                </ol>

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
                    {{--<li class="active">{{ $model->name }}</li>--}}
                {{--</ol>--}}
            </section>

            <modal></modal>

            <!-- Main content -->
            <section class="content">
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

    {!! \Mascame\Artificer\Artificer::assetManager()->js() !!}
</body>
</html>
