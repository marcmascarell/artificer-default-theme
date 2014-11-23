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
		<div class="col-md-offset-2 col-md-8">
			<!--array('Mascame\Artificer\Controller@update', array('slug' => $model['route'], 'id' => $items->id))-->

			{{ Form::model($items, array(
                'route' => array($form_action_route, $model['route'], $items->id),
                'class' => "NO-form-inline dropzone",
                'id' => 'admin-form',
                'method' => $form_method,
                'files' => true,
                'data-file-upload' => URL::route("admin.model.upload", array($model["route"], \Mascame\Artificer\Artificer::getCurrentModelId($items)))
                )
			); }}

				@foreach ($fields as $field)
                    @unless ( $field->isHidden() || (Route::currentRouteName() == 'admin.model.create' && $field->name == 'id'))
                        <div class="form-group">
                            ({{ $field->type }})

                            <?php Event::fire('artificer.view.edit.before.title', $field, $halt = false); ?>
                            {{ Form::label($field->title) }}

                            @if ($field->wiki)
                                <div class="well well-sm">
                                    <i class="{{ $icon['info'] }}"></i>
                                    &nbsp;
                                    <em>{{ $field->wiki }}</em>
                                </div>
                            @endif

                            @if($errors->has())
                                @foreach ($errors->get($field->name) as $message)
                                    {{ $message }}
                                @endforeach
                            @endif

                            <?php Event::fire('artificer.view.edit.before.output', $field, $halt = false); ?>

                            <?php Event::fire('artificer.view.edit.field.' . $field->type . '.before.output', $field->value) ?>
                            {{ $field->output() }}
                            <?php Event::fire('artificer.view.edit.field.' . $field->type . '.after.output', $field->value) ?>

                            <?php Event::fire('artificer.view.edit.after.output', $field, $halt = false); ?>
                        </div>
				    @endunless
				@endforeach

                <div class="text-right">
                    <button class="btn btn-primary" name="_save" type="submit" value="Desar"><i class="{{ $icon['save'] }}"></i> Desar</button>
                    {{--{{ Form::submit('Desar', array('class' => "btn btn-primary", "name" => "_save")) }}--}}
                    {{--{{ Form::submit('Desar i afegir-ne un de nou', array('class' => "btn btn-default", "name" => "_addanother")) }}--}}
                    {{--{{ Form::submit('Desar i continuar editant', array('class' => "btn btn-default", "name" => "_continue")) }}--}}
                </div>

			{{ Form::close() }}
		</div>
	</div>

@stop