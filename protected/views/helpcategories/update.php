<?php
/* @var $this HelpCategoriesController */
/* @var $model HelpCategories */

$this->breadcrumbs=array(
	'Help Categories'=>array('index'),
	$model->title=>array('view','id'=>$model->category_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List HelpCategories', 'url'=>array('index')),
	array('label'=>'Create HelpCategories', 'url'=>array('create')),
	array('label'=>'View HelpCategories', 'url'=>array('view', 'id'=>$model->category_id)),
	array('label'=>'Manage HelpCategories', 'url'=>array('admin')),
);
?>

<h1>Yardım Kategorisini Güncelle <?php echo $model->category_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>