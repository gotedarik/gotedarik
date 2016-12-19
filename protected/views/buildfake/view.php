<?php
/* @var $this SuppliersController */
/* @var $model Suppliers */

$this->breadcrumbs=array(
	'Supplierss'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Suppliers', 'url'=>array('index')),
	array('label'=>'Create Suppliers', 'url'=>array('create')),
	array('label'=>'Update Suppliers', 'url'=>array('update', 'id'=>$model->suppliers_id)),
	array('label'=>'Delete Suppliers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->suppliers_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Suppliers', 'url'=>array('admin')),
);
?>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	<!--//comment-->
		<h2>Tedarikçi #<?php echo $model->username; ?></h2>

		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,

			'htmlOptions' => array('class' => 'table table-hover'),
			'attributes'=>array(
				'suppliers_id',
				'name',
				'username',
				'email',
				'citys_id',
				'address',
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
		<a href="<?php echo Yii::app()->createUrl('buildfake/admin'); ?>" style="width: 100%;" class="btn btn-primary">Geri Dön</a>
	</div>
</div>