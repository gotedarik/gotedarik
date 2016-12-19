<?php
/* @var $this StaticpagesController */
/* @var $data Staticpages */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('staticpage_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->staticpage_id), array('view', 'id'=>$data->staticpage_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pagename')); ?>:</b>
	<?php echo CHtml::encode($data->pagename); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />


</div>