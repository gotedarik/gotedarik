<?php
/* @var $this SocialnetworksController */
/* @var $model Socialnetworks */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'socialnetwork_id'); ?>
		<?php echo $form->textField($model,'socialnetwork_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'socialnetwork_name'); ?>
		<?php echo $form->textField($model,'socialnetwork_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'socialnetwork_url'); ?>
		<?php echo $form->textField($model,'socialnetwork_url',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->