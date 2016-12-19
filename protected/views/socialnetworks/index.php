<?php
/* @var $this SocialnetworksController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Socialnetworks',
);

$this->menu=array(
	array('label'=>'Create Socialnetworks', 'url'=>array('create')),
	array('label'=>'Manage Socialnetworks', 'url'=>array('admin')),
);
?>

<h1>Socialnetworks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
