<?php
/* @var $this HelpQuestionsController */
/* @var $model HelpQuestions */

$this->breadcrumbs=array(
	'Help Questions'=>array('index'),
	$model->question_id,
);

$this->menu=array(
	array('label'=>'List HelpQuestions', 'url'=>array('index')),
	array('label'=>'Create HelpQuestions', 'url'=>array('create')),
	array('label'=>'Update HelpQuestions', 'url'=>array('update', 'id'=>$model->question_id)),
	array('label'=>'Delete HelpQuestions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->question_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HelpQuestions', 'url'=>array('admin')),
);
?>


<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<!--//comment-->
		<h1>Yardım Sorusu : <?php echo $model->question; ?></h1>

		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'htmlOptions' => array('class' => 'table table-hover'),
			'attributes'=>array(
				'category_id',
				'admin_id',
				'question',
				'answer',
				'dateadd',
				array(
					'name'=>'status',
					'value'=>Params::getParams_("status",$model->popular),
				),
				),
		)); ?>
		<div class="x_content">
		</div>
	</div>
</div>