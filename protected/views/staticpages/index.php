<?php
/* @var $this StaticpagesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Staticpages',
);

$this->menu=array(
	array('label'=>'Create Staticpages', 'url'=>array('create')),
	array('label'=>'Manage Staticpages', 'url'=>array('admin')),
);
?>

<h1>Staticpages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
