<?php
/* @var $this HelpCategoriesController */
/* @var $data HelpCategories */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->category_id), array('view', 'id'=>$data->category_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sub_id')); ?>:</b>
	<?php echo CHtml::encode($data->sub_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>