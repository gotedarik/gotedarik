<?php
/* @var $this SettingsdbController */
/* @var $model Settingsdb */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'settingsdb-form',
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
							<?php echo $form->labelEx($model,'phone_number',array('class' => 'control-label col-md-12 col-sm-12 col-xs-12')); ?>
							<div style="margin-bottom: 5px" class="col-md-12 col-sm-12 col-xs-12">
								<?php echo $form->textField($model,'phone_number',array('size'=>45,'maxlength'=>45,'class' => 'form-control col-md-12 col-xs-12','data-inputmask'=>"'mask' : '(999) 999 99 99'")); ?>
								<?php echo $form->error($model,'phone_number',array('class'=>'text-danger')); ?>
							</div>
						</div>

						<div class="clearfix"></div>
						<hr>
						<div class="form-group">
							<?php echo $form->labelEx($model,'fax_number',array('class' => 'control-label col-md-12 col-sm-12 col-xs-12')); ?>
							<div style="margin-bottom: 5px" class="col-md-12 col-sm-12 col-xs-12">
								<?php echo $form->textField($model,'fax_number',array('size'=>45,'maxlength'=>45,'class' => 'form-control col-md-12 col-xs-12','data-inputmask'=>"'mask' : '(999) 999 99 99'")); ?>
								<?php echo $form->error($model,'fax_number',array('class'=>'text-danger')); ?>
							</div>
						</div>


						<div class="clearfix"></div>
						<hr>
						<div class="form-group">
							<?php echo $form->labelEx($model,'address',array('class' => 'control-label col-md-12 col-sm-12 col-xs-12')); ?>
							<div style="margin-bottom: 5px" class="col-md-12 col-sm-12 col-xs-12">
								<?php echo $form->textField($model,'address',array('size'=>45,'maxlength'=>45,'class' => 'form-control col-md-12 col-xs-12')); ?>
								<?php echo $form->error($model,'address',array('class'=>'text-danger')); ?>
							</div>
						</div>

						<div class="clearfix"></div>
						<hr>

						<div id="editornewcontent" class="form-group nopadding">
							<?php echo $form->labelEx($model,'copyright',array('class' => 'control-label col-md-12 col-sm-12 col-xs-12')); ?>
							<div style="margin-bottom: 5px" class="col-md-12 col-sm-12 col-xs-12">
								<?php echo $form->textArea($model,'copyright',array('id'=> 'txtEditor','cols' => '30','rows' => '10')); ?>
								<?php echo $form->error($model,'copyright',array('class'=>'text-danger')); ?>



							</div>
						</div>

						<div class="clearfix"></div>
						<hr>
						<div class="form-group">
							<?php echo $form->labelEx($model,'email_address',array('class' => 'control-label col-md-12 col-sm-12 col-xs-12')); ?>
							<div style="margin-bottom: 5px" class="col-md-12 col-sm-12 col-xs-12">
								<?php echo $form->textField($model,'email_address',array('size'=>45,'maxlength'=>45,'class' => 'form-control col-md-12 col-xs-12')); ?>
								<?php echo $form->error($model,'email_address',array('class'=>'text-danger')); ?>
							</div>
						</div>
						</div>

					<div class="clearfix"></div>
					<hr>
					<div class="form-group">
						<?php echo $form->labelEx($model,'maps',array('class' => 'control-label col-md-12 col-sm-12 col-xs-12')); ?>
						<div style="margin-bottom: 5px" class="col-md-12 col-sm-12 col-xs-12">
							<?php echo $form->textField($model,'maps',array('size'=>45,'maxlength'=>45,'class' => 'form-control col-md-12 col-xs-12')); ?>
							<?php echo $form->error($model,'maps',array('class'=>'text-danger')); ?>
						</div>
					</div>
				</div>

					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<?php echo CHtml::submitButton($model->isNewRecord ? 'Ekle' : 'Güncelle',array('class' => 'btn btn-success')); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->endWidget(); ?>

</div><!-- form -->

<script>

	initEditor('txtEditor');

</script>