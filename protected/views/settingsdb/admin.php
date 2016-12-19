<?php
/* @var $this SettingsdbController */
/* @var $model Settingsdb */

$this->breadcrumbs=array(
	'Settingsdbs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Settingsdb', 'url'=>array('index')),
	array('label'=>'Create Settingsdb', 'url'=>array('create')),
);

?>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<h1>Site Ayarları</h1>
		<div class="x_panel">
			<div class="row">
				<div class="col-sm-12">
					<?php $this->widget('zii.widgets.grid.CGridView', array(
						'id'=>'settingsdb-grid',
						'itemsCssClass' => 'table table-striped table-bordered dataTable no-footer',
						'dataProvider'=>$model->search(),
						'filter'=>$model,
						'columns'=>array(
							'phone_number',
							'fax_number',
							'address',
							'copyright',
							'email_address',
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

