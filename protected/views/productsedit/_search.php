<?php
/* @var $this ProductseditController */
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

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subtitle'); ?>
		<?php echo $form->textField($model,'subtitle',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'salestype'); ?>
		<?php echo $form->textField($model,'salestype'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lastshowdates'); ?>
		<?php echo $form->textField($model,'lastshowdates'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cargopricetype'); ?>
		<?php echo $form->textField($model,'cargopricetype'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cargoprice'); ?>
		<?php echo $form->textField($model,'cargoprice'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lastshowday'); ?>
		<?php echo $form->textField($model,'lastshowday'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lastbidday'); ?>
		<?php echo $form->textField($model,'lastbidday'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'piece'); ?>
		<?php echo $form->textField($model,'piece'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'startingprice'); ?>
		<?php echo $form->textField($model,'startingprice'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'viewed'); ?>
		<?php echo $form->textField($model,'viewed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'code'); ?>
		<?php echo $form->textField($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'discount'); ?>
		<?php echo $form->textField($model,'discount',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'currency'); ?>
		<?php echo $form->textField($model,'currency'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updatedateadd'); ?>
		<?php echo $form->textField($model,'updatedateadd'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'totalpoint'); ?>
		<?php echo $form->textField($model,'totalpoint'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'uservotecount'); ?>
		<?php echo $form->textField($model,'uservotecount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'viewok'); ?>
		<?php echo $form->textField($model,'viewok'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->