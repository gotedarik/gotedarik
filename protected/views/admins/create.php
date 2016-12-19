<?php
/* @var $this AdminsController */
/* @var $model Admins */

$this->breadcrumbs=array(
	'Admins'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Admins', 'url'=>array('index')),
	array('label'=>'Manage Admins', 'url'=>array('admin')),
);
?>

<div class="x_panel">
	<div class="x_content">
		<h1>Admin Oluştur</h1>
	</div>
</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>