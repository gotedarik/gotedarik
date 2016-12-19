<?php
/* @var $this HelpAnnouncementController */
/* @var $data HelpAnnouncement */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('announcement_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->announcement_id), array('view', 'id'=>$data->announcement_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_id')); ?>:</b>
	<?php echo CHtml::encode($data->admin_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateadd')); ?>:</b>
	<?php echo CHtml::encode($data->dateadd); ?>
	<br />


</div>