<?php
/* @var $this CustomertestimonialsController */
/* @var $data Customertestimonials */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('testimonials_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->testimonials_id), array('view', 'id'=>$data->testimonials_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('companyname')); ?>:</b>
	<?php echo CHtml::encode($data->companyname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logoS3_url')); ?>:</b>
	<?php echo CHtml::encode($data->logoS3_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logo')); ?>:</b>
	<?php echo CHtml::encode($data->logo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('text')); ?>:</b>
	<?php echo CHtml::encode($data->text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateadd')); ?>:</b>
	<?php echo CHtml::encode($data->dateadd); ?>
	<br />


</div>