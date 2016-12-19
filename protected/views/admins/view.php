<?php
/* @var $this AdminsController */
/* @var $model Admins */

$this->breadcrumbs=array(
	'Admins'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Admins', 'url'=>array('index')),
	array('label'=>'Create Admins', 'url'=>array('create')),
	array('label'=>'Update Admins', 'url'=>array('update', 'id'=>$model->admin_id)),
	array('label'=>'Delete Admins', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->admin_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Admins', 'url'=>array('admin')),
);
?>
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<!--//comment-->
		<h2>Admin #<?php echo $model->name; ?></h2>

		<div class="x_content">
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'htmlOptions' => array('class' => 'table table-hover'),
				'attributes'=>array(
					'name',
					'email',
					'password',
					'dateadd',
					'title',
				),
			)); ?>
		</div>

		<br>
		<a href="<?php echo Yii::app()->createUrl('admins/admin'); ?>" style="width: 100%;" class="btn btn-primary">Geri Dön</a>
	</div>

</div>

