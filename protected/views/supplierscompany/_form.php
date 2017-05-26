<div style="margin: 10px 0px; font-size: 12px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?php $this->renderPartial("../member/smenu",array("active"=>"companyinformation")); ?>
            </div>
            <div class="col-lg-9 marginn">
                <div style="padding: 10px 30px;" class="block block-sidebar box-header">
                    <form enctype="multipart/form-data" action="#" class="checkout woocommerce-checkout" method="post" name="checkout">
                        <div id="customer_details" class="col2-set">
                            <div class="col-lg-12">
                                <div class="woocommerce-billing-fields">

                                    <h3>Şirket Bilgileri</h3>


                                    <?php $form=$this->beginWidget('CActiveForm', array(
                                        'id'=>'suppliers-form',
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
                                    
									<?php echo $form->errorSummary($model);?>
                                    <p id="billing_first_name_field" class="form-row form-row  validate-required">
                                       
                                        <?php echo $form->labelEx($model,'name',array('class' => 'control-label')); ?>
                                        <?php echo $form->textField($model,'name',array('class' => 'input-text')); ?>
                                        <?php echo $form->error($model,'name',array('class'=>'text-danger')); ?>

                                    </p>
                                    <?php

                                    $arr = array();
                                    for ($i=0;$i<=23;$i++){
                                        if($i<10){
                                            $i= sprintf("%02d", $i);
                                        }
                                        for ($j = 00;$j<=59;$j+=5){
                                            if($j < 10){
                                                $j = sprintf("%02d", $j);
                                            }
                                            $number = $i.":".$j;
                                            $arr[$number] = $number;
                                        }
                                    }

                                    ?>
                                    <p id="billing_first_name_field" class="form-row form-row  validate-required">
                                        <?php echo $form->labelEx($model,'opentime',array('class' => 'control-label')); ?>
                                        <?php echo $form->dropDownList($model,'opentime',$arr,array('class' => 'input-text')); ?>
                                        <?php echo $form->error($model,'opentime',array('class'=>'text-danger')); ?>
                                    </p>

                                    <p id="billing_first_name_field" class="form-row form-row  validate-required">
                                        <?php echo $form->labelEx($model,'closetime',array('class' => 'control-label')); ?>
                                        <?php echo $form->dropDownList($model,'closetime',$arr,array('class' => 'input-text')); ?>
                                        <?php echo $form->error($model,'closetime',array('class'=>'text-danger')); ?>
                                    </p>
                                    <p id="billing_first_name_field" class="form-row form-row  validate-required">

                                        <?php echo $form->labelEx($model,'website',array('class' => 'control-label')); ?>
                                        <?php echo $form->textField($model,'website',array('class' => 'input-text')); ?>
                                        <?php echo $form->error($model,'website',array('class'=>'text-danger')); ?>

                                    </p>
                                    <p id="billing_first_name_field" class="form-row form-row  validate-required">

                                        <?php echo $form->labelEx($model,'map',array('class' => 'control-label')); ?>
                                        <?php echo $form->textField($model,'map',array('class' => 'input-text')); ?>
                                        <?php echo $form->error($model,'map',array('class'=>'text-danger')); ?>

                                    </p>
                                    <p id="billing_first_name_field" class="form-row form-row  validate-required">
                                         <?php echo $form->labelEx($model,'address',array('class' => 'control-label')); ?>
                                        <?php echo $form->textArea($model,'address',array('class' => 'input-text','style' => 'padding:5px')); ?>
                                        <?php echo $form->error($model,'adress',array('class'=>'text-danger')); ?>
                                    </p>

                                    


                                    <input type="submit" data-value="Güncelle" value="Güncelle" style="width: 100%" class="button alt">

                                    <?php $this->endWidget(); ?>
                                </div>
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>