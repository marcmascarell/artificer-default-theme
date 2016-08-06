@extends($layout)

@section('content')

    <div class="row">

        @if (! empty($packages))

            <?php $i = 1; ?>
            @forelse($packages as $packageName => $package)

                @if (\Mascame\Artificer\Artificer::isCoreExtension($packageName))
                    @continue
                @endif

                @include($theme . '.partials._extension')

                @if($i % 3 == 0)
                    <div class="clearfix
                    visible-sm-block
                    visible-md-block
                    visible-lg-block"></div>
                @endif
                <?php $i++ ?>
            @empty
                <div class="col-md-12">
                    {{ ucfirst(Lang::trans('admin::general.no results')) }}
                </div>
            @endforelse

        @endif
    </div>

@stop