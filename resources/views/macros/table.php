<?php

use \Mascame\Artificer\Options\AdminOption;
use Collective\Html\HtmlBuilder as HTML;

function isHidden($key, $hidden)
{
    return (! isset($hidden) || (isset($hidden) && ! in_array($key, $hidden))) ? true : false;
}

function getSort($table_name, $sort)
{
    $sort_table = $table_name;
    $sort_dir = 'asc';

    if ($sort != null && ! empty($sort)) {
        $sorted_table = isset($sort['column']) ? $sort['column'] : null;
        $sort_dir = isset($sort['direction']) ? $sort['direction'] : null;

        if ($sorted_table == $table_name) {
            if ($sort_dir == 'asc') {
                $sort_dir = 'desc';
            } else {
                $sort_dir = 'asc';
            }
        }
    }

    return ['sort_by' => $sort_table, 'direction' => $sort_dir, 'page' => \Illuminate\Support\Facades\Input::get('page')];
}

function getSortIcon($table_name, $sort)
{
    if ($sort['column'] == $table_name) {
        if ($sort['direction'] == 'desc') {
            $icon = AdminOption::get('icons.sort-down');
        } else {
            $icon = AdminOption::get('icons.sort-up');
        }

        return '<i class="'.$icon.'"></i>';
    }
}

HTML::macro('table', function ($model, $data, $fields, $options, $sort,
                               $showView = true, $showEdit = true, $showDelete = true) {
    ?>
	<div class="table-responsive">
		<table class="table table-bordered table-striped datatable"
			   data-start="<?= $data[0]->sort_id ?>" <?php Event::fire('artificer.view.all.tabletag.data', [$model]); ?>>
<!--			data-page="-<\?//= Paginator::getCurrentPage() ?><!--"-->

			<thead>
			<tr>
				<?php
                /**
                 * @var \Mascame\Artificer\Fields\Field
                 */
                foreach ($fields as $field) {
                    if ($field->isVisible()) {
                        ?>
						<th>
							<a href="<?= URL::current().'?'.http_build_query(getSort($field->getName(), $sort)) ?>">
								<?= \Illuminate\Support\Str::title($field->getTitle()) ?>

								<?= getSortIcon($field->getName(), $sort) ?>
							</a>
						</th>
					<?php

                    }
                } ?>


				<?php if ($showEdit || $showDelete || $showView) {
                    ?>
					<th></th>
				<?php 
                } ?>
			</tr>
			</thead>

			<tbody class="sortable">

			<?php
            foreach ($data as $modelData) {
                ?>
				<tr data-id="<?= $modelData->id ?>" data-sort-id="<?= $modelData->sort_id ?>">

					<?php
                        /**
                         * @var \Mascame\Artificer\Fields\Field
                         */
                        foreach ($fields as $name => $field) {
                            if ($field->isVisible()) {
                                ?>
								<td>
									<?php
                                    // Todo
//									if ($field->isRelation()) {
//										$method = $field->relation->getMethod();
//										$field->show($d->$method);
//									} else {

                                    $field->setValue($modelData->$name);

                                echo $field->show();

//									}

                                    ?>
								</td>
							<?php

                            }
                        } ?>

					<?php if ($showEdit || $showDelete || $showView) {
                            ?>
						<td class="text-center">
							<div class="btn-group">
								<?php if ($showEdit) {
                                ?>
									<a href="<?= route('admin.model.edit', ['slug' => $model->route, 'id' => $modelData->id], $absolute = true) ?>"
									   type="button" class="btn btn-default">
										<i class="<?= AdminOption::get('icons.edit') ?>"></i>
									</a>
								<?php 
                            } ?>

								<?php if ($showView) {
                                ?>
									<a href="<?= route('admin.model.show', ['slug' => $model->route, 'id' => $modelData->id], $absolute = true) ?>" type="button"
									   class="btn btn-default">
										<i class="<?= AdminOption::get('icons.show') ?>"></i>
									</a>
								<?php 
                            } ?>

								<?php if ($showDelete) {
                                ?>
									<a data-method="delete" data-token="<?= csrf_token() ?>"
									   href="<?= route('admin.model.destroy', ['slug' => $model->route, 'id' => $modelData->id], $absolute = true) ?>"
									   type="button" class="btn btn-default">
										<i class="<?= AdminOption::get('icons.delete')  ?>"></i>
									</a>
								<?php 
                            } ?>
							</div>
						</td>

					<?php 
                        } ?>
				</tr>
			<?php 
            } ?>

			</tbody>
		</table>
	</div>
<?php

});
