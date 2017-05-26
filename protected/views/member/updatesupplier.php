<div style="margin: 10px 0px; font-size: 12px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?php $this->renderPartial("smenu",array("active"=>"information")); ?>
            </div>
            <div class="col-lg-9 marginn">
                <div style="padding: 10px 30px;" class="block block-sidebar box-header">
                        <div id="customer_details" class="col2-set">
                            <div class="col-lg-12">
                                <div class="woocommerce-billing-fields">

                                    <h3>Kullanıcı Bilgileri</h3>

                                    <?php if($isupdate==1):?>
                                        <div id="alertpassword" class="alert alert-success">
                                            <strong>Bilgiler Başarılı Bir Şekilde Güncellendi.</strong>
                                        </div>
                                    <?php elseif($isupdate==2):?>
                                        <div id="alertpassword" class="alert alert-danger">
                                            <strong>Güncellemede Hata Oluştu. Lüfen Tekrar Deneyiniz Veya iletişime Geçiniz.</strong>
                                        </div>
                                    <?php endif;?>

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
                                    <p id="billing_first_name_field" class="form-row form-row">
                                        <?php echo $form->labelEx($model,'name',array('class' => 'control-label')); ?>
                                        <?php echo $form->textField($model,'name',array('class' => 'form-control col-md-7 col-xs-12')); ?>
                                        <?php echo $form->error($model,'name',array('class'=>'text-danger')); ?>

                                    </p>

                                    <p id="billing_first_name_field" class="form-row form-row">
                                        <?php echo $form->labelEx($model,'username',array('class' => 'control-label')); ?>
                                        <?php echo $form->textField($model,'username',array('class' => 'form-control col-md-7 col-xs-12')); ?>
                                        <?php echo $form->error($model,'username',array('class'=>'text-danger')); ?>

                                    </p>

                                    <p id="billing_first_name_field" class="form-row form-row  ">
                                        <?php echo $form->labelEx($model,'email',array('class' => 'control-label')); ?>
                                        <?php echo $form->textField($model,'email',array('class' => 'form-control col-md-7 col-xs-12')); ?>
                                        <?php echo $form->error($model,'email',array('class'=>'text-danger')); ?>

                                    </p>

                                    <p id="billing_email_field" class="form-row form-row form-row-first  validate-email">
                                        <?php echo $form->labelEx($model,'phone',array('class' => 'control-label')); ?>
                                        <?php echo $form->textField($model,'phone',array('class' => 'form-control col-md-7 col-xs-12')); ?>
                                        <?php echo $form->error($model,'phone',array('class'=>'text-danger')); ?>
                                    </p>

                                    <p id="billing_phone_field" class="form-row form-row form-row-last  validate-phone">
                                        <?php echo $form->labelEx($model,'fax',array('class' => 'control-label')); ?>
                                        <?php echo $form->textField($model,'fax',array('class' => 'form-control col-md-7 col-xs-12')); ?>
                                        <?php echo $form->error($model,'fax',array('class'=>'text-danger')); ?>
                                    <div class="clear"></div>

                                    <p id="billing_city_field" class="form-row form-row form-row-wide address-field " data-o_class="form-row form-row form-row-wide address-field ">
                                        <?php echo $form->labelEx($model,'citys_id',array('class' => 'control-label')); ?>
                                        <span class="clear"></span>
                                        <?php echo $form->dropDownList($model,'citys_id',Getcache::getCitysListDropDown(),array('class' => 'form-control col-md-7 col-xs-12')); ?>
                                        <?php echo $form->error($model,'citys_id',array('class'=>'text-danger')); ?>
                                    </p>

                                    <p id="billing_address_1_field" class="form-row form-row form-row-wide address-field ">
                                        <?php echo $form->labelEx($model,'address',array('class' => 'control-label')); ?>
                                        <?php echo $form->textArea($model,'address',array('class' => 'form-control col-md-7 col-xs-12 select-input')); ?>
                                        <?php echo $form->error($model,'address',array('class'=>'text-danger')); ?>
                                    </p>

                                    <p style="margin-top: 10px;">
                                        <?php echo CHtml::submitButton('Güncelle',array('class' => 'button alt')); ?>

                                    </p>
                                    <?php $this->endWidget(); ?>

                                </div>
                            </div>


                        </div>
                </div>
            </div>
        </div>
    </div>
</div>