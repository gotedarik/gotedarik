<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>
<div class="x_panel">
	<div class="x_content">
			<h1>Kullanıcı Oluştur</h1>
		</div>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>