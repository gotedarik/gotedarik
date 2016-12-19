<?php
/* @var $this HelpCategoriesController */
/* @var $model HelpCategories */

$this->breadcrumbs=array(
	'Help Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List HelpCategories', 'url'=>array('index')),
	array('label'=>'Manage HelpCategories', 'url'=>array('admin')),
);
?>

<h1>Yeni bir yardım kategorisi oluştur</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>