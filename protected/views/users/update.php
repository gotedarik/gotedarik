<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name=>array('view','id'=>$model->users_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'View Users', 'url'=>array('view', 'id'=>$model->users_id)),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>
	<div class="x_panel">
		<div class="x_content">
			<h3>Kullanıcı Düzenle <?php echo ": ".$model->name; ?></h3>
		</div>
	</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>