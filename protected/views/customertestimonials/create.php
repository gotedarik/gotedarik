<?php
/* @var $this CustomertestimonialsController */
/* @var $model Customertestimonials */

$this->breadcrumbs=array(
	'Customertestimonials'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Customertestimonials', 'url'=>array('index')),
	array('label'=>'Manage Customertestimonials', 'url'=>array('admin')),
);
?>

<div class="x_panel">
	<div class="x_content">
		<h3>Yeni Bir Müşteri Görüşü Ekle</h3>
	</div>
</div>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>