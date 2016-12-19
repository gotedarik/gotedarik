<?php
/* @var $this AdminsController */
/* @var $model Admins */

$this->breadcrumbs=array(
	'Admins'=>array('index'),
	$model->name=>array('view','id'=>$model->admin_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Admins', 'url'=>array('index')),
	array('label'=>'Create Admins', 'url'=>array('create')),
	array('label'=>'View Admins', 'url'=>array('view', 'id'=>$model->admin_id)),
	array('label'=>'Manage Admins', 'url'=>array('admin')),
);
?>
	<div class="x_panel">
		<div class="x_content">
			<h3>Admin Güncelle <?php echo ": ".$model->name; ?></h3>
		</div>
	</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>