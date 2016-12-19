<?php
/* @var $this ProductgroupController */
/* @var $model Productgroup */

$this->breadcrumbs=array(
	'Productgroups'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Productgroup', 'url'=>array('index')),
	array('label'=>'Create Productgroup', 'url'=>array('create')),
	array('label'=>'Update Productgroup', 'url'=>array('update', 'id'=>$model->productgroup_id)),
	array('label'=>'Delete Productgroup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->productgroup_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Productgroup', 'url'=>array('admin')),
);
?>

<h1>View Productgroup #<?php echo $model->productgroup_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'productgroup_id',
		'sub_id',
		'name',
		'status',
	),
)); ?>
