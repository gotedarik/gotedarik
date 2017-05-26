<div style="margin: 10px 0px; font-size: 12px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                  <?php 
                if(!empty(Yii::app()->user->getState("user_id")))
                    $this->renderPartial("umenu",array("active"=>"information"));
                else
                    $this->renderPartial("smenu",array("active"=>"information"));
                ?>
            </div>
            <div class="col-lg-9 marginn">
                <div style="padding: 10px 30px;" class="block block-sidebar box-header">
                        <div id="customer_details" class="col2-set">
                            <div class="col-lg-12">
                                <div class="woocommerce-billing-fields">

                                    <h3>Şifrenizi Güncelleyin</h3>

                                    <div id="alertpassword" class="alert alert-success hides">
                                        <strong></strong>
                                    </div>


                                    <p id="billing_first_name_field" class="form-row form-row  validate-required">
                                        <label class="" for="billing_first_name">Mevcut Şifreniz <abbr title="required" class="required">*</abbr></label>
                                        <input type="password" id="changepassword_register_oldpassword" placeholder="Mevcut Şifrenizi Giriniz" id="billing_company" name="billing_company" class="input-text ">

                                    </p>
                                    
                                    <p id="changepassword_register_error_oldpassword" class="error_system"></p>

                                    <p id="billing_first_name_field" class="form-row form-row  validate-required">
                                        <label class="" for="billing_first_name">Yeni Şifre <abbr title="required" class="required">*</abbr></label>
                                        <input type="password" id="changepassword_register_newpassword" placeholder="Yeni şifrenizi giriniz" id="billing_company" name="billing_company" class="input-text ">

                                    </p>

                                    <p id="changepassword_register_error_newpassword" class="error_system"></p>

                                    <p id="billing_first_name_field" class="form-row form-row  validate-required">
                                        <label class="" for="billing_first_name">Yeni Şifre ( Tekrar ) <abbr title="required" class="required">*</abbr></label>
                                        <input type="password" id="changepassword_register_newpassword2" placeholder="Yeni şifrenizi tekrar giriniz" id="billing_company" name="billing_company" class="input-text ">

                                    </p>

                                    <p id="changepassword_register_error_newpassword2" class="error_system"></p>

                                    <input onclick="changepassword()" type="button" data-value="Güncelle" value="Güncelle" style="width: 100%" class="button alt">

                                    <p id="changepassword_register_error" class="error_system"></p>

                                    <p id="changepassword_register_success" class="success_system"></p>
                                </div>
                            </div>


                        </div>
                </div>
            </div>
        </div>
    </div>
</div>