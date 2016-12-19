<?php
/* @var $this HelpCategoriesController */
/* @var $model HelpCategories */

$this->breadcrumbs=array(
	'Help Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List HelpCategories', 'url'=>array('index')),
	array('label'=>'Create HelpCategories', 'url'=>array('create')),
);

?>
<div class="row">

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<h1>Yardım Kategorilerini Yönet</h1>
			<div class="row">
				<div class="col-sm-12">
					<?php $this->widget('zii.widgets.grid.CGridView', array(
						'id'=>'help-categories-grid',
						'itemsCssClass' => 'table table-striped table-bordered dataTable no-footer',
						'cssFile' => Yii::app()->request->baseUrl."/frontadmin/grid/gridview/styles.css",
						'dataProvider'=>$model->search(),
						'filter'=>$model,
						'columns'=>array(
							'sub_id',
							'title',
							array(
								"type"=>"raw",
								'name'=>'status',
								'value'=>'Params::getParams_("status",$data->status)',
								'filter'=>Params::getParams("status"),
							),
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

