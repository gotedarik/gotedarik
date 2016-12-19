<?php
/* @var $this ProductseditController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Products', 'url'=>array('index')),
	array('label'=>'Create Products', 'url'=>array('create')),
	array('label'=>'Update Products', 'url'=>array('update', 'id'=>$model->products_id)),
	array('label'=>'Delete Products', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->products_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Products', 'url'=>array('admin')),
);
?>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<!--//comment-->
		<h1>Ürün: <?php echo $model->name; ?></h1>
		<div class="x_content">

		<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
			'htmlOptions' => array('class' => 'table table-hover'),

			'attributes'=>array(
		'suppliers_id',
		'name',
		'productgroup_id',
		array(
			'name'=>'deleted',
			'value'=>Params::getParams_("deleted",$model->deleted),
		),
		array(
			'name'=>'admindeleted',
			'value'=>Params::getParams_("deleted",$model->admindeleted),
		),
		'dateadd',
		array(
			'name'=>'status',
			'value'=>Params::getParams_("status",$model->status),
		),
		'subtitle',
		array(
			'name'=>'salestype',
			'value'=>Params::getParams_("salestype",$model->salestype),
		),
		'lastshowdates',
		'cargopricetype',
		'cargoprice',
		'price',
		'lastshowday',
		'lastbidday',
		'piece',
		'startingprice',
		'viewed',
		'code',
		'discount',
		array(
			'name'=>'currency',
			'value'=>Params::getParams_("currency",$model->currency),
		),
		'updatedateadd',
		'totalpoint',
		'uservotecount',
		'viewok',
	),
)); ?>
		</div>
	</div>
</div>
<div class="clearfix"></div>