<?php
/* @var $this CustomertestimonialsController */
/* @var $model Customertestimonials */

$this->breadcrumbs=array(
	'Customertestimonials'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Customertestimonials', 'url'=>array('index')),
	array('label'=>'Create Customertestimonials', 'url'=>array('create')),
);

?>


<div class="x_panel">
	<div class="x_content">
		<h3>Müşteri Yorumları</h3>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="row">
				<div class="col-sm-12">

					<?php $this->widget('zii.widgets.grid.CGridView', array(
						'id'=>'customertestimonials-grid',
						'itemsCssClass' => 'table table-striped table-bordered dataTable no-footer',
						'cssFile' => Yii::app()->request->baseUrl."/frontadmin/grid/gridview/styles.css",
						'dataProvider'=>$model->search(),
						'filter'=>$model,
						'columns'=>array(
							'companyname',
							'dateadd',
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
