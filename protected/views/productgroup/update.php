<?php
/* @var $this ProductgroupController */
/* @var $model Productgroup */

$this->breadcrumbs=array(
	'Productgroups'=>array('index'),
	$model->name=>array('view','id'=>$model->productgroup_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Productgroup', 'url'=>array('index')),
	array('label'=>'Create Productgroup', 'url'=>array('create')),
	array('label'=>'View Productgroup', 'url'=>array('view', 'id'=>$model->productgroup_id)),
	array('label'=>'Manage Productgroup', 'url'=>array('admin')),
);
?>

<div class="x_panel">
	<div class="x_content">
		<h3>Ürün Grubu Düzenle <?php echo ": ".$model->name; ?></h3>
	</div>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>