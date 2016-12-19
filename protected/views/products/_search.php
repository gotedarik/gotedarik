<?php
/* @var $this ProductsController */
/* @var $model Products */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'products_id'); ?>
		<?php echo $form->textField($model,'products_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'suppliers_id'); ?>
		<?php echo $form->textField($model,'suppliers_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'productgroup_id'); ?>
		<?php echo $form->textField($model,'productgroup_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deleted'); ?>
		<?php echo $form->textField($model,'deleted'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'admindeleted'); ?>
		<?php echo $form->textField($model,'admindeleted'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dateadd'); ?>
		<?php echo $form->textField($model,'dateadd'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->