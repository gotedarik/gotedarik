<?php
/* @var $this ProductsController */
/* @var $model Products */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'products-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'suppliers_id'); ?>
		<?php echo $form->textField($model,'suppliers_id'); ?>
		<?php echo $form->error($model,'suppliers_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'productgroup_id'); ?>
		<?php echo $form->textField($model,'productgroup_id'); ?>
		<?php echo $form->error($model,'productgroup_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deleted'); ?>
		<?php echo $form->textField($model,'deleted'); ?>
		<?php echo $form->error($model,'deleted'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'admindeleted'); ?>
		<?php echo $form->textField($model,'admindeleted'); ?>
		<?php echo $form->error($model,'admindeleted'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateadd'); ?>
		<?php echo $form->textField($model,'dateadd'); ?>
		<?php echo $form->error($model,'dateadd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subtitle'); ?>
		<?php echo $form->textField($model,'subtitle',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'subtitle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'salestype'); ?>
		<?php echo $form->textField($model,'salestype'); ?>
		<?php echo $form->error($model,'salestype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastshowdates'); ?>
		<?php echo $form->textField($model,'lastshowdates'); ?>
		<?php echo $form->error($model,'lastshowdates'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cargopricetype'); ?>
		<?php echo $form->textField($model,'cargopricetype'); ?>
		<?php echo $form->error($model,'cargopricetype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cargoprice'); ?>
		<?php echo $form->textField($model,'cargoprice'); ?>
		<?php echo $form->error($model,'cargoprice'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastshowday'); ?>
		<?php echo $form->textField($model,'lastshowday'); ?>
		<?php echo $form->error($model,'lastshowday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastbidday'); ?>
		<?php echo $form->textField($model,'lastbidday'); ?>
		<?php echo $form->error($model,'lastbidday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'piece'); ?>
		<?php echo $form->textField($model,'piece'); ?>
		<?php echo $form->error($model,'piece'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'startingprice'); ?>
		<?php echo $form->textField($model,'startingprice'); ?>
		<?php echo $form->error($model,'startingprice'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'viewed'); ?>
		<?php echo $form->textField($model,'viewed'); ?>
		<?php echo $form->error($model,'viewed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code'); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'discount'); ?>
		<?php echo $form->textField($model,'discount',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'discount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currency'); ?>
		<?php echo $form->textField($model,'currency'); ?>
		<?php echo $form->error($model,'currency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updatedateadd'); ?>
		<?php echo $form->textField($model,'updatedateadd'); ?>
		<?php echo $form->error($model,'updatedateadd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'totalpoint'); ?>
		<?php echo $form->textField($model,'totalpoint'); ?>
		<?php echo $form->error($model,'totalpoint'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'uservotecount'); ?>
		<?php echo $form->textField($model,'uservotecount'); ?>
		<?php echo $form->error($model,'uservotecount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'viewok'); ?>
		<?php echo $form->textField($model,'viewok'); ?>
		<?php echo $form->error($model,'viewok'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->