<?php
/* @var $this BuildfakeController */
/* @var $model Fakeproducts */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'fakeproducts-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
	)); ?>
	<div class="">
		<div class="clearfix"></div>
		<div class="row">

			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<?php

					if($model->hasErrors()){

						?>
						<hr>
						<!-- start accordion -->
						<div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">
							<div class="panel">
								<a class="panel-heading collapsed text-danger" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree1" aria-expanded="false" aria-controls="collapseThree">
									<h4 class="panel-title">Bir Takım Hatalar Oluştu</h4>
								</a>
								<div id="collapseThree1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
									<div class="panel-body">
										<?php echo $form->errorSummary($model);?>

									</div>
								</div>
							</div>
						</div>
						<!-- end of accordion -->


						<hr>
					<?php } ?>
					<p class="note"><strong class="required text-danger">( * )</strong> alanlar gereklidir.</p>				<div class="x_title">
					</div>
					<div class="x_content">
						<br />
						<div class="form-group">
							<?php echo $form->labelEx($model,'supplier_id',array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')); ?>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<?php echo $form->dropDownList($model,'supplier_id',BuildfakeController::getFakesuppliers(),array('class' => 'form-control col-md-9 col-xs-12')); ?>
								<?php echo $form->error($model,'supplier_id',array('class'=>'text-danger')); ?>
							</div>
						</div>
						<div class="clearfix"></div>
						<br>
						<div class="form-group">
							<?php echo $form->labelEx($model,'url',array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')); ?>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=> 225,'class' => 'form-control col-md-7 col-xs-12')); ?>
								<?php echo $form->error($model,'url',array('class'=>'text-danger')); ?>
							</div>
						</div>
						<div class="clearfix"></div>

						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<?php echo CHtml::submitButton($model->isNewRecord ? 'Ekle' : 'Güncelle',array('class' => 'btn btn-success')); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->