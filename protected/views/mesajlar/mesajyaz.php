<?php
/* @var $this CompanymessagesController */
/* @var $model Companymessages */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'companymessages-mesajyaz-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>
<div class="container">
	<table class="table">
		<thead>
		<tr>
			<th colspan="2">
				<?php echo $form->errorSummary($model); ?>
			</th>
		</tr>
		<tr>
			<th colspan="2">Cevapla</th>
		</tr>

		</thead>
		<tbody>
		<tr>
			<td><strong>Alıcı</strong></td>
			<td class="borders">
				<?php

					if(!empty(Yii::app()->user->getState("user_id"))){
						echo $msg->suppliername;
					}else if(!empty(Yii::app()->user->getState("supplier_id"))){
						echo $msg->username;
					}

				?>
			</td>
		</tr>
		<tr>
			<td width="120"><strong>
					Konu
				</strong></td>
			<td class="borders">
				<?=$msg->subject?>
			</td>
		</tr>
		<tr>
			<td><strong>
					Cevap
				</strong>
			</td>
			<td class="borders">
				<?php echo $form->textArea($model,'message',array("class" =>"form-control","style" =>"border:1px solid #e5e5e5",'cols' => '30','rows' => '10')); ?>
				<?php echo $form->error($model,'message'); ?>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<?php echo CHtml::submitButton('Gönder',array("class" => "pull-lg-right")); ?>
			</td>
		</tr>
		</tbody>
	</table>

</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
