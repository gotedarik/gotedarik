<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Products', 'url'=>array('index')),
	array('label'=>'Create Products', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#products-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Ürün Yönetimi</h1>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="row">
				<div class="col-sm-12">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'products-grid',
	'itemsCssClass' => 'table table-striped table-bordered dataTable',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'code',
		'suppliers_id',
		'name',
		'productgroup_id',
		'deleted',
		/*
		'dateadd',
		*/
		array(
			'class'=>'CButtonColumn',
			'htmlOptions' => array('style'=>'width:170px'),
			'template'=>'{view}{update}{delete}',
			'buttons' => array(
				'update' => array
				(
					'imageUrl'=>Yii::app()->request->baseUrl.'/frontadmin/img/update.png',
					'options' => array(
						'class'=> 'update btn btn-default',
					),
				),
				'view' => array
				(
					'imageUrl'=>Yii::app()->request->baseUrl.'/frontadmin/img/view.png',
					'options' => array(
						'class'=> 'view btn btn-default',
					),
				),
				'delete' => array
				(
					'imageUrl'=>Yii::app()->request->baseUrl.'/frontadmin/img/delete.png',
					'options' => array(
						'class'=> 'delete btn btn-default',
					),
				),
			),
		),
	),
)); ?>
				</div>
			</div>
		</div>
	</div>
</div>
