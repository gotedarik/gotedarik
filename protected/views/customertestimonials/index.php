<?php
/* @var $this CustomertestimonialsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Customertestimonials',
);

$this->menu=array(
	array('label'=>'Create Customertestimonials', 'url'=>array('create')),
	array('label'=>'Manage Customertestimonials', 'url'=>array('admin')),
);
?>

<h1>Customertestimonials</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
