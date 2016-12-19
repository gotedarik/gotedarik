<?php
/* @var $this StaticpagesController */
/* @var $model Staticpages */

$this->breadcrumbs=array(
	'Staticpages'=>array('index'),
	$model->staticpage_id,
);

$this->menu=array(
	array('label'=>'List Staticpages', 'url'=>array('index')),
	array('label'=>'Create Staticpages', 'url'=>array('create')),
	array('label'=>'Update Staticpages', 'url'=>array('update', 'id'=>$model->staticpage_id)),
	array('label'=>'Delete Staticpages', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->staticpage_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Staticpages', 'url'=>array('admin')),
);
?>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
<h1>Bilgi Sayfası  #<?php echo $model->pagename; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions' => array('class' => 'table table-hover'),

	'attributes'=>array(
		'pagename',
		'content',
	),
)); ?>
</div></div>