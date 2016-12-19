<?php
/* @var $this SocialnetworksController */
/* @var $data Socialnetworks */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('socialnetwork_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->socialnetwork_id), array('view', 'id'=>$data->socialnetwork_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('socialnetwork_name')); ?>:</b>
	<?php echo CHtml::encode($data->socialnetwork_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('socialnetwork_url')); ?>:</b>
	<?php echo CHtml::encode($data->socialnetwork_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>