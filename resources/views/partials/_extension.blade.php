
<div class="col-xs-offset-1 col-xs-10 col-sm-offset-0 col-sm-4 col-md-4 col-lg-4">

    <!-- Primary tile -->
    <div class="box">
        <div class="box-header">

            {{--@if ($extension->thumbnail)--}}
                {{--<img src="{{ $extension->thumbnail }}" alt="" class="img-responsive" height="200">--}}
            {{--@endif--}}

            <h3 class="box-title">
                {{ $package->name }}
            </h3>

            <div class="box-tools pull-right">
                {{--@if (isset($extension->routes) && !empty($extension->routes))--}}
                    {{--@foreach ($extension->routes as $key => $value)--}}
                        {{--<a href="{{ $value['route'] }}" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">--}}
                            {{--{{ $value['title'] }}--}}
                        {{--</a>--}}
                    {{--@endforeach--}}
                {{--@endif--}}

                {{--@if ($extension->isInstalled())--}}
                    {{--<a href="{{ route('admin.'.$type.'.uninstall', $extension->slug) }}" class="btn btn-danger btn-md">Uninstall</a>--}}
                {{--@else--}}
                    {{--<a href="{{ route('admin.'.$type.'.install', $extension->slug) }}" class="btn btn-default btn-md">Install</a>--}}
                {{--@endif--}}

            </div>
        </div>

        <div class="box-body">
            <p>
                {{ $package->description }}
            </p>

            @foreach($package->provides as $type => $extensions)

                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            Provides {{ $type }}
                        </th>
                        <th>
                        </th>

                    </tr>
                    </thead>

                    <tbody>

                    @foreach($extensions as $extension)
                        <tr>
                            <?php
                            if ($type == 'widgets') {
                                $extension = \Mascame\Artificer\Artificer::widgetManager()->get($extension);
                            } else {
                                $extension = \Mascame\Artificer\Artificer::pluginManager()->get($extension);
                            }
                            ?>

                            <td>{{ $extension->name }}</td>
                            <td>
                                @if ($extension->isInstalled())
                                    <a href="{{ route('admin.'.$type.'.uninstall', $extension->slug) }}" class="btn btn-danger btn-md">Uninstall</a>
                                @else
                                    <a href="{{ route('admin.'.$type.'.install', $extension->slug) }}" class="btn btn-default btn-md">Install</a>
                                @endif
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>

            @endforeach
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
                    <td>{{ $package->version }}</td>
                    <td>
                        @foreach($package->authors as $author)
                            {{ $author['name'] }}
                        @endforeach
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div><!-- /.box -->

</div>