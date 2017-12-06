
<div class="col-xs-offset-1 col-xs-10 col-sm-offset-0 col-sm-4 col-md-4 col-lg-4">

    <!-- Primary tile -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">
                {{ $package->name }}
            </h3>
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

                            <td>
                                {{ $extension->name }}
                            </td>
                            <td>
                                @if (\Mascame\Artificer\Artificer::isCoreExtension($extension->namespace))
                                    <span class="label label-info">Core extension</span>
                                @else
                                    @if ($extension->isInstalled())
                                        <a href="{{ route('admin.'.$type.'.uninstall', $extension->slug) }}" class="btn btn-danger btn-md">Uninstall</a>
                                    @else
                                        <a href="{{ route('admin.'.$type.'.install', $extension->slug) }}" class="btn btn-default btn-md">Install</a>
                                    @endif
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