<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'Update Users', 'url'=>array('update', 'id'=>$model->users_id)),
	array('label'=>'Delete Users', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->users_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	<!--//comment-->
		<h2>Kullanıcı #<?php echo $model->username; ?></h2>

		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'htmlOptions' => array('class' => 'table table-hover'),
			'attributes'=>array(
				'name',
				'username',
				'email',
				'birthday',
				'dateadd',
				//comment
				array(
					'type'=>'raw', 
					'name'=>'deleted',
					'value'=>Params::getParams_('deleted',$model->deleted),
				),
			),
		)); ?>
		<hr>
		<a href="<?php echo Yii::app()->createUrl('users/admin'); ?>" style="width: 100%;" class="btn btn-primary">Geri Dön</a>
	</div>
</div>