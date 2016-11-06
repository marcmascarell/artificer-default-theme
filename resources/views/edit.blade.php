
@extends($layout)

@section('content-header')
	<h1>
        {{ $model->name }}
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
        <li class="active">{{ $model->name }}</li>
    </ol>
@overwrite

@section('content')
	<div class="row">
		<div class="col-md-offset-2 col-md-8">
			<!--array('Mascame\Artificer\Controller@update', array('slug' => $model['route'], 'id' => $items->id))-->
            {{--'data-file-upload' => URL::route("admin.model.upload", array($model["route"], \Mascame\Artificer\Artificer::getCurrentModelId($items)))--}}

			{!! Form::model($items, array(
                'route' => array($formActionRoute, $model->route, $items->id),
                'class' => "",
                'id' => 'admin-form',
                'method' => $formMethod,
                'files' => true,
                )
			) !!}

                <div class="box">
                    <div class="box-body">
                        @foreach ($fields as $field)
                            @if ($field->isVisible())
                                {{ HTML::field($field, $icon, $errors) }}
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="text-right">
                    <button class="btn btn-primary" name="_save" type="submit" value="Desar">
                        <i class="{{ $icon['save'] }}"></i> Save
                    </button>
                    {{--{{ Form::submit('Desar', array('class' => "btn btn-primary", "name" => "_save")) }}--}}
                    {{--{{ Form::submit('Desar i afegir-ne un de nou', array('class' => "btn btn-default", "name" => "_addanother")) }}--}}
                    {{--                    {{ Form::submit('Desar i continuar editant', array('class' => "btn btn-default", "name" => "_continue")) }}--}}
                </div>


			{!! Form::close() !!}
		</div>
	</div>

@stop