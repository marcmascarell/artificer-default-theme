@extends($layout)

@section('content-header')
	<h1>
		{{ $model['name'] }}
		<small>Install</small>
	</h1>
@overwrite

@section('content')

	This page is a helper guide.

	<h2>Models</h2>
	Models found (<b>{{ count($models) }}</b> in <b>{{ join(', ', \Mascame\Artificer\Options\AdminOption::get('models.directories')) }}</b>):
	<br>
	<i>Config location: app/config/packages/mascame/artificer/models.php</i>

	<br>
	<br>

	<ul>
		@foreach ($models as $model)

			<li>
				@if (isset($model['options']['title']))

					{{ $model['options']['title'] }}
				@else
					{{ Str::title($model['table']) }}
				@endif

				@if ($model['hidden'])
					(hidden)
				@endif
			</li>
		@endforeach
	</ul>

	<h2>Plugins</h2>

		@if (count($plugins) > 0)
			<ul>
				@foreach(array_merge($plugins['installed'], $plugins['uninstalled']) as $plugin)
					<li>
						{{ $plugin }}
					</li>
				@endforeach
			</ul>
		@endif

	<h2>Fields</h2>

	{{ var_dump(\Mascame\Artificer\Options\AdminOption::get('types')) }}
@stop

