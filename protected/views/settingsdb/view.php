<?php
/* @var $this SettingsdbController */
/* @var $model Settingsdb */

$this->breadcrumbs=array(
	'Settingsdbs'=>array('index'),
	$model->settings_id,
);

$this->menu=array(
	array('label'=>'List Settingsdb', 'url'=>array('index')),
	array('label'=>'Create Settingsdb', 'url'=>array('create')),
	array('label'=>'Update Settingsdb', 'url'=>array('update', 'id'=>$model->settings_id)),
	array('label'=>'Delete Settingsdb', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->settings_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Settingsdb', 'url'=>array('admin')),
);
?>
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<!--//comment-->
		<h1>Site Bilgileri</h1>

		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'htmlOptions' => array('class' => 'table table-hover'),
			'attributes'=>array(
				'phone_number',
				'fax_number',
				'address',
				'copyright',
				'email_address',
			),
		)); ?>
		<div class="x_content">
		</div>
	</div>
</div>