@extends($layout)

@section('content')
<h2>{{ $model['name'] }}</h2>

    <div class="row">
        <div class="col-md-12 text-right">


        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <ul class="list-group">
                <li class="list-group-item">
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
                </li>
            </ul>

            <div class="text-right">
                <a href="{{ route('admin.model.edit', array($model['route'], $fields['id']->value)) }}" class="btn btn-primary">
                    <i class="{{ $icon['edit'] }}"></i> Edit
                </a>
            </div>

        </div>
    </div>

@stop