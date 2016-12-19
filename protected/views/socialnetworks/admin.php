<?php
/* @var $this SocialnetworksController */
/* @var $model Socialnetworks */

$this->breadcrumbs=array(
	'Socialnetworks'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Socialnetworks', 'url'=>array('index')),
	array('label'=>'Create Socialnetworks', 'url'=>array('create')),
);

?>

<h1>Sosyal Hesapları Yönetin</h1>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="row">
				<div class="col-sm-12">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'socialnetworks-grid',
	'itemsCssClass' => 'table table-striped table-bordered dataTable no-footer',
	'cssFile' => Yii::app()->request->baseUrl."/frontadmin/grid/gridview/styles.css",
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'socialnetwork_name',
		'socialnetwork_url',
		array(
			"type"=>"raw",
			'name'=>'status',
			'value'=>'Params::getParams_("status",$data->status)',
			'filter'=>Params::getParams("status"),
		),
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
