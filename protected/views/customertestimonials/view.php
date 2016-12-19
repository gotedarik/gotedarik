<?php
/* @var $this CustomertestimonialsController */
/* @var $model Customertestimonials */

$this->breadcrumbs=array(
	'Customertestimonials'=>array('index'),
	$model->testimonials_id,
);

$this->menu=array(
	array('label'=>'List Customertestimonials', 'url'=>array('index')),
	array('label'=>'Create Customertestimonials', 'url'=>array('create')),
	array('label'=>'Update Customertestimonials', 'url'=>array('update', 'id'=>$model->testimonials_id)),
	array('label'=>'Delete Customertestimonials', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->testimonials_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Customertestimonials', 'url'=>array('admin')),
);
?>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<!--//comment-->
	<h1>Müşteri Görüşü #<?php echo $model->companyname; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions' => array('class' => 'table table-hover'),
	'attributes'=>array(
		'companyname',
		'logoS3_url',
		'logo',
		'text',
		'dateadd',
	),
)); ?>
	</div>
</div>