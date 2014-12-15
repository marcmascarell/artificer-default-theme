<div class="form-group">
@if (App::environment() != 'production')
({{ $field->type }})
@endif

<?php Event::fire('artificer.view.edit.before.title', $field, $halt = false); ?>
{{ Form::label($field->title) }}
<?php Event::fire('artificer.view.edit.after.title', $field, $halt = false); ?>

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