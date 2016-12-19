<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
);
Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerCoreScript('jquery.ui');
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Kullanıcı Yönetimi</h1>

<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="row">
					<div class="col-sm-12">
						<?php $this->widget('zii.widgets.grid.CGridView', array(
							'id'=>'users-grid',
							'dataProvider'=>$model->search(),
							'filter'=>$model,
							'itemsCssClass' => 'table table-striped table-bordered dataTable no-footer',
							'cssFile' => Yii::app()->request->baseUrl."/frontadmin/grid/gridview/styles.css",
							'columns'=>array(
								'name',
								'username',
								'email',
								'dateadd',
								array(
									'class'=>'CButtonColumn',
									'htmlOptions' => array('style' => 'width : 170px;'),
									'template' => '{view}{update}{delete}',
									'buttons' => array(
										'view' => array(
											'imageUrl' => Yii::app()->request->baseUrl."/frontadmin/img/view.png",
											'options' => array(
												'class'=> 'view btn btn-default',
											),
										),
										'update' => array(
											'imageUrl' => Yii::app()->request->baseUrl."/frontadmin/img/update.png",
											'options' => array(
												'class'=> 'update btn btn-default',
											),
										),
										'delete' => array(
											'imageUrl' => Yii::app()->request->baseUrl."/frontadmin/img/delete.png",
											'options' => array(
												'class'=> 'delete btn btn-default',
											),
										),
									)
								),
							),
						)); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

