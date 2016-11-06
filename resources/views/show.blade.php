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
            <div class="box">
                <div class="box-body">
                @foreach ($fields as $field)
                    @if ($field->isVisible())
                        <ul class="list-group">
                            <li class="list-group-item">
                                ({{ $field->getType() }})
                            </li>

                            <li class="list-group-item">
                                <strong>
                                    {{ $field->getTitle() }}
                                </strong>
                            </li>

                            <li class="list-group-item">
                                {!! $field->show($item[$field->getName()]) !!}
                            </li>
                        </ul>
                    @endif
                @endforeach
                </div>
            </div>

            <div class="text-right">
                <a href="{{ route('admin.model.edit', array($model->route, $fields['id']->value)) }}" class="btn btn-primary">
                    <i class="{{ $icon['edit'] }}"></i> Edit
                </a>
            </div>

        </div>
    </div>

@stop