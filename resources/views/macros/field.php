<?php

HTML::macro('field', function ($field, $icon, $errors = false) {
    ?>
	<div class="form-group <?= ($errors->has($field->getName())) ? 'has-error' : ''; ?>">
		<?php if (App::environment() != 'production') {
        //			print '(' . $field->type . ') > ';
//			print ($field->isFillable()) ? 'fillable' : 'not-fillable';
    } ?>

		<?php Event::fire('artificer.view.edit.before.title', $field, $halt = false); ?>

		<?= Form::label($field->title) ?>

		<?php Event::fire('artificer.view.edit.after.title', $field, $halt = false); ?>

		<?php if ($field->wiki) {
        ?>
			<div class="well well-sm">
				<i class="<?= $icon['info'] ?>"></i>
				&nbsp;
				<em><?= $field->wiki ?></em>
			</div>
		<?php 
    } ?>

		<?php if ($errors && $errors->has($field->getName())) {
        foreach ($errors->get($field->getName()) as $message) {
            echo "<div class='error'>$message</div>";
        }
    } ?>

		<?php Event::fire('artificer.view.edit.before.output', $field, $halt = false); ?>

		<?php Event::fire('artificer.view.edit.field.'.$field->type.'.before.output', $field->value) ?>

		<?= $field->protectGuarded()->withWidgets()->output() ?>

		<?php Event::fire('artificer.view.edit.field.'.$field->type.'.after.output', $field->value) ?>

		<?php Event::fire('artificer.view.edit.after.output', $field, $halt = false); ?>
	</div>
	<?php

});
