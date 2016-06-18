@extends($layout)

@section('content')

    <div class="row">

        <div class="col-md-12">
            <h2>Installed</h2>
        </div>

        @if (isset($extensions['installed']))

            <?php $i = 1; ?>
            @forelse($extensions['installed'] as $extension)

                @include($theme . '.partials._extension')

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

        @if (isset($extensions['uninstalled']))
            <?php $i = 1; ?>
            @foreach($extensions['uninstalled'] as $extension)

                @include($theme . '.partials._extension')

                @if ($i % 3 == 0)
                    <div class="clearfix visible-md-block"></div>
                @endif
                <?php $i++ ?>

            @endforeach
        @endif
    </div>

@stop