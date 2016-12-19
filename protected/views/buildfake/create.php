<?php
/* @var $this SuppliersController */
/* @var $model Suppliers */

$this->breadcrumbs=array(
	'Supplierss'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Suppliers', 'url'=>array('index')),
	array('label'=>'Manage Suppliers', 'url'=>array('admin')),
);
?>

<div class="x_panel">
	<div class="x_content">
			<h1>Tedarikçi Oluştur</h1>
		</div>
</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>