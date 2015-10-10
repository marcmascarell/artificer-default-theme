
<div class="col-xs-offset-1 col-xs-10 col-sm-offset-0 col-sm-4 col-md-4 col-lg-3">

    <!-- Primary tile -->
    <div class="box">
        <div class="box-header">

            @if ($plugin->thumbnail)
                <img src="{{ $plugin->thumbnail }}" alt="" class="img-responsive" height="200">
            @endif

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

                @if ($plugin->isInstalled())
                    <a href="{{ route('admin.page.plugin.uninstall', $plugin->slug) }}" class="btn btn-danger btn-md">Uninstall</a>
                @else
                    <a href="{{ route('admin.page.plugin.install', $plugin->slug) }}" class="btn btn-default btn-md">Install</a>
                @endif

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