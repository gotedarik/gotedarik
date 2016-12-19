<?php
/* @var $this ProductgroupController */
/* @var $model Productgroup */

$this->breadcrumbs=array(
	'Productgroups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Productgroup', 'url'=>array('index')),
	array('label'=>'Manage Productgroup', 'url'=>array('admin')),
);
?>

<div class="x_panel">
	<div class="x_content">
		<h3>Yeni bir ürün grubu oluştur</h3>
	</div>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>