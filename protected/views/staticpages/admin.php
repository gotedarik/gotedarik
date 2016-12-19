<?php
/* @var $this StaticpagesController */
/* @var $model Staticpages */

$this->breadcrumbs=array(
	'Staticpages'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Staticpages', 'url'=>array('index')),
	array('label'=>'Create Staticpages', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#staticpages-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="row">
				<div class="col-sm-12">
<h1>Bilgi saylarını düzenle</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'staticpages-grid',
	'itemsCssClass' => 'table table-striped table-bordered dataTable no-footer',
	'cssFile' => Yii::app()->request->baseUrl."/frontadmin/grid/gridview/styles.css",
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'pagename',
		'content',
		array(
			'class'=>'CButtonColumn',
			'htmlOptions' => array('style'=>'width:170px'),
			'template'=>'{view}{update}',
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

			),
		),
	),
)); ?>
</div>
</div>
</div>
</div>
</div>