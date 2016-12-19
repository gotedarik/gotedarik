<?php
/* @var $this HelpCategoriesController */
/* @var $model HelpCategories */

$this->breadcrumbs=array(
	'Help Categories'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List HelpCategories', 'url'=>array('index')),
	array('label'=>'Create HelpCategories', 'url'=>array('create')),
	array('label'=>'Update HelpCategories', 'url'=>array('update', 'id'=>$model->category_id)),
	array('label'=>'Delete HelpCategories', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->category_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HelpCategories', 'url'=>array('admin')),
);
?>



<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<h1>Yardım Kategorisi : <?php echo $model->title; ?></h1>

		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'htmlOptions' => array('class' => 'table table-hover'),
			'attributes'=>array(
				'category_id',
				'sub_id',
				'title',
				'status',
			),
		)); ?>
		<div class="x_content">
		</div>
	</div>
</div>
