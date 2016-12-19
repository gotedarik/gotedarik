<?php
/* @var $this CustomertestimonialsController */
/* @var $model Customertestimonials */

$this->breadcrumbs=array(
	'Customertestimonials'=>array('index'),
	$model->testimonials_id=>array('view','id'=>$model->testimonials_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Customertestimonials', 'url'=>array('index')),
	array('label'=>'Create Customertestimonials', 'url'=>array('create')),
	array('label'=>'View Customertestimonials', 'url'=>array('view', 'id'=>$model->testimonials_id)),
	array('label'=>'Manage Customertestimonials', 'url'=>array('admin')),
);
?>

<div class="x_panel">
	<div class="x_content">
		<h3>Müşteri görüşü düzenle <?php echo $model->companyname; ?></h3>
	</div>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>