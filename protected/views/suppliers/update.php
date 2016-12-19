<?php
/* @var $this SuppliersController */
/* @var $model Suppliers */

$this->breadcrumbs=array(
	'Supplierss'=>array('index'),
	$model->name=>array('view','id'=>$model->suppliers_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Suppliers', 'url'=>array('index')),
	array('label'=>'Create Suppliers', 'url'=>array('create')),
	array('label'=>'View Suppliers', 'url'=>array('view', 'id'=>$model->suppliers_id)),
	array('label'=>'Manage Suppliers', 'url'=>array('admin')),
);
?>

<div class="x_panel">
	<div class="x_content">
		<h3>Tedarikci Düzenle <?php echo ": ".$model->name; ?></h3>
	</div>
</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>