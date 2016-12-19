<?php
/* @var $this SocialnetworksController */
/* @var $model Socialnetworks */

$this->breadcrumbs=array(
	'Socialnetworks'=>array('index'),
	$model->socialnetwork_id,
);

$this->menu=array(
	array('label'=>'List Socialnetworks', 'url'=>array('index')),
	array('label'=>'Create Socialnetworks', 'url'=>array('create')),
	array('label'=>'Update Socialnetworks', 'url'=>array('update', 'id'=>$model->socialnetwork_id)),
	array('label'=>'Delete Socialnetworks', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->socialnetwork_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Socialnetworks', 'url'=>array('admin')),
);
?>
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<!--//comment-->
<h1>Sosyal Ağ #<?php echo $model->socialnetwork_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions' => array('class' => 'table table-hover'),
	'attributes'=>array(
		'socialnetwork_id',
		'socialnetwork_name',
		'socialnetwork_url',
		array(
			'type'=>'raw',
			'name'=>'status',
			'value'=>Params::getParams_('status',$model->status),
		),	),
)); ?>
	</div>
</div>