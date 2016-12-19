<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'News'=>array('index'),
	'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#news-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

function getImage($img)
{
	return '<img src="'.$img.'" width="120" />';
}
?>

<h1>Haber Yönetimi</h1>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="row">
				<div class="col-sm-12">
					<?php $this->widget('zii.widgets.grid.CGridView', array(
						'id'=>'news-grid',
						'itemsCssClass' => 'table table-striped table-bordered dataTable no-footer',
						'cssFile' => Yii::app()->request->baseUrl."/frontadmin/grid/gridview/styles.css",
						'dataProvider'=>$model->search(),
						'filter'=>$model,
						'columns'=>array(
							array(
								"type"=>"raw",
						        'name'=>'imgM',
						        'value'=>'getImage($data->imgS_s3url)',
						    ),
							'title',
							'read',
							array(
								"type"=>"raw",
						        'name'=>'status',
						        'value'=>'Params::getParams_("status",$data->status)',
						        'filter'=>Params::getParams("status"),
						    ),
							"dateadd",
							
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

