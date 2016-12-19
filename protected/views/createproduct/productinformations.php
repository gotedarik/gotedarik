<?php

$this->renderPartial("head");

?>

<form role="form">

    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <div class="tabs-block">
                    <div class="products-carousel-tabs">
                        <ul class="nav nav-inline">
                            <li class="nav-item"><a class="nav-link active" href="#tab-products-11" data-toggle="tab">Ürün Özellikleriniz</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-products-11" role="tabpanel">
                            <div class="row padding10">
                                <div class="col-md-5 mar1">
                                    <p id="billing_last_name_field" class="form-row form-row">
                                            <span class="img-box2 col-lg-12 col-sm-12 col-xs-12">
                                            <img src="<?=Yii::app()->request->baseUrl;?>/front/images/img_upload.png" class="img-responsive img-box-img-main" alt="">
                                                   <input class="fileuproduct-main" type="file">
                                            </span>

                                    </p>

                                    <div class="clearfix"></div>

                                    <p class="form-row form-row hizala">

                                            <span class="img-box-thumb col-lg-3 col-sm-3 col-xs-3">
                                                <img src="<?=Yii::app()->request->baseUrl;?>/front/images/img_upload.png" class="img-responsive img-box-img-small" alt="">
                                                   <input class="fileuproduct" type="file">
                                            </span>

                                             <span class="img-box-thumb col-lg-3 col-sm-3 col-xs-3">
                                                <img src="<?=Yii::app()->request->baseUrl;?>/front/images/img_upload.png" class="img-responsive img-box-img-small" alt="">
                                                   <input class="fileuproduct" type="file">
                                             </span>

                                             <span class="img-box-thumb col-lg-3 col-sm-3 col-xs-3">
                                                <img src="<?=Yii::app()->request->baseUrl;?>/front/images/img_upload.png" class="img-responsive img-box-img-small" alt="">
                                                   <input class="fileuproduct" type="file">
                                             </span>

                                             <span class="img-box-thumb col-lg-3 col-sm-3 col-xs-3">
                                                <img src="<?=Yii::app()->request->baseUrl;?>/front/images/img_upload.png  " class="img-responsive img-box-img-small" alt="">
                                                   <input class="fileuproduct" type="file">
                                             </span>

                                        <span class="img-box-thumb col-lg-3 col-sm-3 col-xs-3">
                                                <img src="<?=Yii::app()->request->baseUrl;?>/front/images/img_upload.png" class="img-responsive img-box-img-small" alt="">
                                                   <input class="fileuproduct" type="file">
                                            </span>

                                             <span class="img-box-thumb col-lg-3 col-sm-3 col-xs-3">
                                                <img src="<?=Yii::app()->request->baseUrl;?>/front/images/img_upload.png" class="img-responsive img-box-img-small" alt="">
                                                   <input class="fileuproduct" type="file">
                                             </span>

                                             <span class="img-box-thumb col-lg-3 col-sm-3 col-xs-3">
                                                <img src="<?=Yii::app()->request->baseUrl;?>/front/images/img_upload.png" class="img-responsive img-box-img-small" alt="">
                                                   <input class="fileuproduct" type="file">
                                             </span>

                                             <span class="img-box-thumb col-lg-3 col-sm-3 col-xs-3">
                                                <img src="<?=Yii::app()->request->baseUrl;?>/front/images/img_upload.png  " class="img-responsive img-box-img-small" alt="">
                                                   <input class="fileuproduct" type="file">
                                             </span>

                                    </p>

                                </div>

                                <div class="col-md-7">


                                    <div id="billing_last_name_field" class="form-row form-row">
                                        <label class="" for="billing_last_name">Ürün Başlığı <abbr title="required" class="required">*</abbr></label>
                                        <input type="text" value="" placeholder="Ürün Başlığı : " id="billing_last_name" name="billing_last_name" class="input-text ">
                                    </div>
                                    <div class="clear"></div>

                                    <div id="billing_last_name_field" class="form-row form-row">
                                        <label class="" for="billing_last_name">Ürün Alt Başlığı <abbr title="required" class="required">*</abbr></label>
                                        <input type="text" value="" placeholder="Ürün Alt Başlığı : " id="billing_last_name" name="billing_last_name" class="input-text ">
                                    </div>
                                    <div class="clear"></div>

                                    <div id="billing_last_name_field" class="form-row form-row">
                                        <div class="clear"></div>
                                        <div class="sagcount">
                                            <p style="font-size: 14px;">Satacağınız Üründen Elinizde Kaç Adet Var ?</p>
                                            <div id="CountSelect">

                                                <ul>
                                                    <li class="adeText"><span>Adet</span></li>
                                                    <li style="padding: 0; margin: 0;"><input type="text" value="1"></li>
                                                    <li class="adeText"><a href="">+</a></li>
                                                    <li><a href="">-</a></li>
                                                </ul>
                                            </div>
                                            <hr>
                                            <div class="p_price">
                                                <p style="font-size: 14px;">Ürün Fiyatı</p>
                                                    <table style="overflow-y: hidden" class="table table-responsive">
                                                        <tbody>
                                                        <tr>
                                                            <td style="position: relative;top: 10px;"><b>Başlangıç Fiyatı</b></td><td><input class="textright" type="text" placeholder="0" value=""></td><td>
                                                                <input class="textright" type="text" placeholder="00" value=""></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="position: relative;top: 10px;"><b>Hemen Al Fiyatı</b></td><td><input class="textright" type="text" placeholder="0" value=""></td><td>
                                                                <input class="textright" type="text" placeholder="00" value=""></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>

                                </div>
                            </div>
                            <hr>
                            <div class="row padding10">
                                <div class="col-md-12 mar1">
                                    <p id="order_comments_field" class="form-row form-row notes">
                                        <label class="" for="order_comments">Ürün Açıklaması</label>
                                        <textarea cols="5" rows="10" placeholder="Ürün Açıklaması" id="order_comments" class="input-text " name="order_comments"></textarea>
                                    </p>

                                </div>
                            </div>
                            <hr>
                            <div class="row padding10">
                                <div class="col-md-12">

                                    <div id="order_comments_field" class="form-row form-row">
                                        <i style="color: #00abc5; margin-right: 10px;" class="fa fa-calendar fa-3x"></i><label style="position: relative; top: -10px;">Ürününüz Kaç Gün Satışta Kalsın ?</label>
                                        <div class="clear"></div>
                                        <div class="col-lg-12 col-md-12">
                                            <ul class="calendardays">
                                         
                                                <li>
                                                    <button type="button" class="ubtn ubtn-default btn-radio2">1 <br>  Gün</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>

                                                <li>
                                                    <button type="button" class="ubtn ubtn-default btn-radio2">3 <br>  Gün</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>

                                                <li>
                                                    <button type="button" class="ubtn ubtn-default btn-radio2">5 <br>  Gün</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>

                                                <li>
                                                    <button type="button" class="ubtn ubtn-default btn-radio2">7 <br> Gün</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>

                                                <li>
                                                    <button type="button" class="ubtn ubtn-default btn-radio2">10 <br>  Gün</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>

                                                <li>
                                                    <button type="button" class="ubtn ubtn-default btn-radio2">30 <br>  Gün</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>

                                                <li>
                                                    <button type="button" class="ubtn ubtn-default btn-radio2">60 <br>  Gün</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>

                                                <li>
                                                    <button type="button" class="ubtn ubtn-default btn-radio2">90 <br>  Gün</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>
                                                <li>
                                                    <button type="button" class="ubtn ubtn-default btn-radio2">120 <br>  Gün</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </li>
                                            </ul>

                                        </div>

                                    </div>

                                </div>
                            </div>
                            <hr>
                            <div class="row padding10">
                                <div class="col-md-12">

                                    <div id="order_comments_field" class="form-row form-row">
                                        <i style="color: #00abc5; margin-right: 10px;" class="fa fa-truck fa-3x"></i><label style="position: relative; top: -10px;">Kargo Ücretini Kim Ödeyecek ?</label>
                                        <div class="clear"></div>
                                        <div class="col-lg-6 col-md-12">
                                            <button type="button" class="ubtn ubtn-default btn-radio">Satıcı Öder (Ücretsiz Kargo)</button>
                                            <input type="checkbox" id="left-item" hidden="hidden">
                                        </div>

                                        <div class="col-lg-6 col-md-12">
                                            <button type="button" class="ubtn ubtn-default btn-radio">Alıcı Öder</button>
                                            <input type="checkbox" id="left-item" hidden="hidden">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr>
                            <div class="row padding10">
                                <div class="col-md-12">

                                    <div id="order_comments_field" class="form-row form-row">
                                        <i style="color: #00abc5; margin-right: 10px;" class="fa fa-user-secret fa-3x"></i><label style="position: relative; top: -10px;">Bu Ürünü Kimler Alabilir ?</label>
                                        <div class="clear"></div>
                                        <div class="col-lg-4 col-md-12">
                                            <button type="button" class="ubtn ubtn-default btn-radio1">Herkese Açık</button>
                                            <input type="checkbox" id="aliciler" hidden="hidden">
                                        </div>

                                        <div class="col-lg-4 col-md-12">
                                            <button type="button" class="ubtn ubtn-default btn-radio1">Kurumsal Şirketler</button>
                                            <input type="checkbox" id="aliciler" hidden="hidden">
                                        </div>

                                        <div class="col-lg-4 col-md-12">
                                            <button type="button" class="ubtn ubtn-default btn-radio1">Tedarikçiler</button>
                                            <input type="checkbox" id="aliciler" hidden="hidden">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr>



                        </div>

                    </div>
                </div>
                <a href="<?=Yii::app()->createUrl('createproduct/productdescription')?>" class="btn btn-primary nextBtn btn-lg pull-left" type="button" >Geri Git</a>
                <a href="<?=Yii::app()->createUrl('createproduct/productreview')?>" class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Sonraki Adım</a>            </div>
        </div>
    </div>

</form>
</div>
