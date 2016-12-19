<?php
/* @var $this SettingsdbController */
/* @var $data Settingsdb */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('settings_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->settings_id), array('view', 'id'=>$data->settings_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_number')); ?>:</b>
	<?php echo CHtml::encode($data->phone_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fax_number')); ?>:</b>
	<?php echo CHtml::encode($data->fax_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('copyright')); ?>:</b>
	<?php echo CHtml::encode($data->copyright); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_address')); ?>:</b>
	<?php echo CHtml::encode($data->email_address); ?>
	<br />


</div>