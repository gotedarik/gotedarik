<?php
/* @var $this HelpCategoriesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Help Categories',
);

$this->menu=array(
	array('label'=>'Create HelpCategories', 'url'=>array('create')),
	array('label'=>'Manage HelpCategories', 'url'=>array('admin')),
);
?>

<h1>Help Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
