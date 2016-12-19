<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->title,
);

?>


<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<!--//comment-->
		<h1>Haber: #<?php echo $model->title; ?></h1>

		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'htmlOptions' => array('class' => 'table table-hover'),
			'attributes'=>array(
				'news_id',
				array(
			        'name'=>'admins_id',
			        'value'=>Func::getAdmin($model->admins_id)->name,
			    ),
				'title',
				array(
			        'name'=>'status',
			        'value'=>Params::getParams_("status",$model->status),
			    ),
),
		)); ?>
	</div>
</div>