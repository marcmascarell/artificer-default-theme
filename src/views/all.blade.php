@extends($layout)

@section('content-header')
	<h1>
		{{ $model['name'] }}
		<small>Model</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="#">
				<i class="{{ $icon['dashboard'] }}"></i> Dashboard
			</a>
		</li>
		<li>
			<a href="#">
				<i class="{{ $icon['models'] }}"></i> Models
			</a>
		</li>
		<li class="active">{{ $model['name'] }}</li>
	</ol>
@overwrite

@section('content')


    <div class="row">
        <div class="col-md-12 text-right main-buttons">

            <button class="btn btn-default" data-toggle="filter">
                <i class="{{ $icon['filter'] }}"></i> Filter
            </button>

            <a href="{{ route('admin.model.create', $model['route']) }}" class="btn btn-primary">
                <i class="{{ $icon['new'] }}"></i> New
            </a>
        </div>
    </div>

    @if (!$items->isEmpty())
        <?php Event::fire('artificer.view.all.before.showList', array($model, $items), $halt = false); ?>

        <div class="row">
            <div class="col-md-12 filters">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                        <i class="{{ $icon['filter'] }}"></i> Filter
                        </h3>
                    </div>

                    <div class="box-body">
                        {{ Form::open(array('route' => array('admin.model.filter', $model['route']), 'method' => 'post')) }}
                            <div class="row">
                                @foreach($fields as $field)

                                    @if ($field->hasFilter())
                                        <div class="col-md-4">
                                            {{ Str::title($field->title) }}
                                            {{ $field->displayFilter() }}
                                        </div>
                                    @endif

                                @endforeach
                            </div>


                            <br>

                            <div class="text-right">
                                <button type="submit" class="btn btn-default">
                                    <i class="{{ $icon['search'] }}"></i>
                                </button>
                            </div>

                        {{ Form::close() }}
                    </div>
                </div>

            </div>
        </div>

        {{ HTML::table($model, $items, $fields, $models[$model['name']]['options'], $sort, $icon,
            $permit['view'],
            $permit['update'],
            $permit['delete'])
        }}

        <?php Event::fire('artificer.view.all.after.showList', array($model, $items), $halt = false);  ?>

    @else
        {{ ucfirst(Lang::trans('artificer::general.no results')) }}
    @endif


@stop

