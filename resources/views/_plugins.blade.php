@extends($layout)

@section('content')

	<div class="row">

        <div class="col-md-12">
            <h2>Installed</h2>
        </div>

        @if (isset($plugins['installed']))

            <?php $i = 1; ?>
            @forelse($plugins['installed'] as $plugin)

                <div class="col-md-4">

                    <!-- Primary tile -->
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">
                                {{ $plugin->name }}
                            </h3>

                            <div class="box-tools pull-right">
                                @if (isset($plugin->routes) && !empty($plugin->routes))
                                    @foreach ($plugin->routes as $key => $value)
                                        <a href="{{ $value['route'] }}" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                            {{ $value['title'] }}
                                        </a>
                                    @endforeach
                                @endif
                                <a href="{{ route('admin.page.plugin.uninstall', $plugin->slug) }}" class="btn btn-default btn-sm">Uninstall</a>
                            </div>
                        </div>

                        <div class="box-body">
                            <p>
                                {{ $plugin->description }}
                            </p>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>
                                        Version
                                    </th>

                                    <th>
                                        Author
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td>{{ $plugin->version }}</td>
                                    <td>{{ $plugin->author }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div><!-- /.box -->

                </div>

                @if($i % 3 == 0)
                    <div class="clearfix visible-md-block"></div>
                @endif
                <?php $i++ ?>
            @empty
                <div class="col-md-12">
                    {{ ucfirst(Lang::trans('admin::general.no results')) }}
                </div>
            @endforelse

        @endif
	</div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <h2>Not installed</h2>
        </div>

        @if (isset($plugins['uninstalled']))
            <?php $i = 1; ?>
            @foreach($plugins['uninstalled'] as $plugin)
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">
                                {{ $plugin->name }}
                            </h3>

                            <div class="box-tools pull-right">
                                @if (isset($plugin->routes) && !empty($plugin->routes))
                                    @foreach ($plugin->routes as $key => $value)
                                    <a href="{{ $value['route'] }}" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                        {{ $value['title'] }}
                                    </a>
                                    @endforeach
                                @endif

                                <a href="{{ route('admin.page.plugin.install', $plugin->slug) }}" class="btn btn-default btn-sm">Install</a>

                            </div>
                        </div>

                        <div class="box-body">
                            <p>
                                {{ $plugin->description }}
                            </p>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>
                                        Version
                                    </th>

                                    <th>
                                        Author
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td>{{ $plugin->version }}</td>
                                    <td>{{ $plugin->author }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div><!-- /.box -->

                </div>

                @if ($i % 3 == 0)
                    <div class="clearfix visible-md-block"></div>
                @endif
                <?php $i++ ?>

            @endforeach
        @endif
    </div>

@stop