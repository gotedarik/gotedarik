<?php
/* @var $this StaticpagesController */
/* @var $model Staticpages */

$this->breadcrumbs=array(
	'Staticpages'=>array('index'),
	$model->staticpage_id=>array('view','id'=>$model->staticpage_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Staticpages', 'url'=>array('index')),
	array('label'=>'Create Staticpages', 'url'=>array('create')),
	array('label'=>'View Staticpages', 'url'=>array('view', 'id'=>$model->staticpage_id)),
	array('label'=>'Manage Staticpages', 'url'=>array('admin')),
);
?>

<h1>Bilgi sayfasını güncelle : <?php echo $model->pagename; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>