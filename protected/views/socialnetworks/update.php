<?php
/* @var $this SocialnetworksController */
/* @var $model Socialnetworks */

$this->breadcrumbs=array(
	'Socialnetworks'=>array('index'),
	$model->socialnetwork_id=>array('view','id'=>$model->socialnetwork_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Socialnetworks', 'url'=>array('index')),
	array('label'=>'Create Socialnetworks', 'url'=>array('create')),
	array('label'=>'View Socialnetworks', 'url'=>array('view', 'id'=>$model->socialnetwork_id)),
	array('label'=>'Manage Socialnetworks', 'url'=>array('admin')),
);
?>

<h1>Sosyal Ağ Düzenle <?php echo $model->socialnetwork_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>