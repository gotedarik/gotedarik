<?php
/* @var $this ProductseditController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->name=>array('view','id'=>$model->products_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Products', 'url'=>array('index')),
	array('label'=>'Create Products', 'url'=>array('create')),
	array('label'=>'View Products', 'url'=>array('view', 'id'=>$model->products_id)),
	array('label'=>'Manage Products', 'url'=>array('admin')),
);
?>

<div class="x_panel">
	<div class="x_content">
		<h3>Ürün Güncelle: <?php echo $model->name; ?></h3>
	</div>
</div>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>