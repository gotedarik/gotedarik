<div style="margin: 10px 0px; font-size: 12px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?php $this->renderPartial("umenu",array("active"=>"information")); ?>
            </div>
            <div class="col-lg-9 marginn">
                <div style="padding: 10px 30px;" class="box-border">
                    <div class="checkout woocommerce-checkout">
                        <div id="customer_details" class="col2-set">
                            <div class="col-lg-12">
                                <div class="woocommerce-billing-fields">

                                    <h3>Yeni Adres Ekle</h3>


                                    <?php $form=$this->beginWidget('CActiveForm', array(
                                        'id'=>'users-form',
                                        'htmlOptions' => array(
                                            'class' => "form-horizontal form-label-left",
                                            'data-parsley-validate' => "",
                                        ),
                                        // Please note: When you enable ajax validation, make sure the corresponding
                                        // controller action is handling ajax validation correctly.
                                        // There is a call to performAjaxValidation() commented in generated controller code.
                                        // See class documentation of CActiveForm for details on this.
                                        'enableAjaxValidation'=>false,
                                    )); ?>
                                    <p id="billing_address_1_field" class="form-row form-row form-row-wide address-field ">
                                        <?php echo $form->labelEx($model,'current_address',array('class' => 'control-label')); ?><br>
                                        <?php echo $form->checkBox($model,'current_address'); ?>
                                        <?php echo $form->error($model,'current_address',array('class'=>'text-danger')); ?>
                                    </p>
                                    <p id="billing_address_1_field" class="form-row form-row form-row-wide address-field">
                                        <?php echo $form->labelEx($model,'address',array('class' => 'control-label')); ?>
                                        <?php echo $form->textArea($model,'address',array('class' => 'form-control col-md-7 col-xs-12 select-input')); ?>
                                        <?php echo $form->error($model,'address',array('class'=>'text-danger')); ?>
                                    </p>
                                    
                                   <?php echo CHtml::submitButton('Ekle',array('class' => 'button alt')); ?>
                                    <?php $this->endWidget(); ?>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>