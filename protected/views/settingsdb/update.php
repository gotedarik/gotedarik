<?php
/* @var $this SettingsdbController */
/* @var $model Settingsdb */

$this->breadcrumbs=array(
	'Settingsdbs'=>array('index'),
	$model->settings_id=>array('view','id'=>$model->settings_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Settingsdb', 'url'=>array('index')),
	array('label'=>'Create Settingsdb', 'url'=>array('create')),
	array('label'=>'View Settingsdb', 'url'=>array('view', 'id'=>$model->settings_id)),
	array('label'=>'Manage Settingsdb', 'url'=>array('admin')),
);
?>

<h1>Ayarları Güncelle</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>