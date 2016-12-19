<?php
/* @var $this ProductgroupController */
/* @var $data Productgroup */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('productgroup_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->productgroup_id), array('view', 'id'=>$data->productgroup_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sub_id')); ?>:</b>
	<?php echo CHtml::encode($data->sub_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>