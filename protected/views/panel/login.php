<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<div class="container">
    
	<div class="row" style="margin-top: 100px"><!--//comment-->
		<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">

			<div class="jumbotron">
				<fieldset>
					<h2 style="text-align: center">Lütfen Giriş Yapın</h2>
					<hr class="colorgraph">
					<div class="form-group">
						<?php echo $form->emailField($model,'username',array("class"=>"form-control","required"=>"required","placeholder"=>"Email")); ?>
						<?php echo $form->error($model,'username'); ?>
					</div>
					<div class="form-group">
						<?php echo $form->passwordField($model,'password',array("class"=>"form-control","required"=>"required","placeholder"=>"Şifre")); ?>
						<?php echo $form->error($model,'password'); ?>
					</div>
					<hr class="colorgraph">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<!--//comment-->
						<?php echo CHtml::submitButton('Giriş Yap',array('class' => 'btn btn-lg btn-success btn-block')); ?>
						</div>

					</div>
				</fieldset>
			</div>


		</div>
	</div>

</div>

<?php $this->endWidget(); ?>
