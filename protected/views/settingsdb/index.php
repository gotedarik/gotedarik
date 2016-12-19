<?php
/* @var $this SettingsdbController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Settingsdbs',
);

$this->menu=array(
	array('label'=>'Create Settingsdb', 'url'=>array('create')),
	array('label'=>'Manage Settingsdb', 'url'=>array('admin')),
);
?>

<h1>Settingsdbs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
