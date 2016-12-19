<style type="text/css">
    .stepwizard-step p {
        margin-top: 10px;
        font-weight: bold;
    }

    .stepwizard-row {
        display: table-row;
    }

    .stepwizard {
        display: table;
        width: 100%;
        position: relative;
    }

    .stepwizard-step button[disabled] {
        opacity: 1 !important;
        filter: alpha(opacity=100) !important;
    }

    .stepwizard-row:before {
        top: 22px;
        background: #ffffff;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        border: 1px solid #e5e5e5;
        border-radius: 2px;
        height: 9px;

    }
    .control-label{
        cursor: pointer;
        font-size: 16px;
    }

    .stepwizard-step {
        display: table-cell;
        text-align: center;
        position: relative;
    }

    .btn-circle {
        width: 50px;
        height: 50px;
        text-align: center;
        border: 1px solid #e5e5e5;
        padding: 14px 0;
        font-weight: 800;
        font-size: 14px;
        line-height: 1.428571429;
        border-radius: 25px;
        background: white;
    }

    .mar1{
        margin-bottom: 20px;
        margin-top: 20px;
    }

    .btn-primary{
        color: #fff;
        background-color: #5cb85c;
        border-color: #4cae4c;
    }
    .btn-lg{
        margin: 10px 5px;
    }
    #CountSelect{
        border: 1px solid #d8d8d8;
        display: inline-block;
        font-weight: 700;
        margin: 15px 0 10px 0;
    }
    #buttons{
        display: inline-block;
        font-weight: 700;
        margin: 25px 0 10px 0;
        text-align: center;
    }
    #CountSelect ul{
        list-style-type: none;
        padding: 0;
        margin: 0;
    }
    #CountSelect ul li{
        text-align: center;
        display: block;
        float: left;
        font-size: 1.167em;
        height: 58px;
        padding: 20px 10px;
    }
   .adeText{
       border-right: 1px solid #d8d8d8;
   }
    #CountSelect ul li span{
        padding: 0 5px;
    }

    #CountSelect ul li input[type="text"]{
        margin: 0;
        border: none;
        border-radius: 0;
        padding: 20px;
        width: 100px;
        border-right: 1px solid #d8d8d8;
    }
    #CountSelect ul li a{
        position: relative;
        padding: 0 10px;
    }
    .sagcount{
        position: relative;
        top: 40px;
    }
    .sagcount p{
        font-weight: bold;
        font-size: 16px;
    }
    .alttext{
        position: relative;
        top: 10px;
    }
    .ubtn-default:hover,.ubtn-default:focus{
        background-color: #5cb85c;
        border-color: #4cae4c;
    }
    .tabs-block .nav .nav-item a{
        font-size: 14px;
    }
    .padding10{
        padding: 10px;
    }
    .img-box1{
        max-width: 300px;
        max-height: 300px;
        background: #FFFFFF;
        border: 1px solid #e5e5e5;
        padding: 5px;
    }
    .img-box-thumb{
        max-height: 69px;
        max-width: 69px;
        background: #FFFFFF;
        border: 1px solid #e5e5e5;
        padding: 5px;
        margin-right: 5px;
        margin-top: 5px;
    }
    .img-box-img1{
        opacity: 0.442;
        width: 100%;
        height: 100%;
    }
</style>


<div class="container border123 mar1">
    <h1 class="mar1">Ürünlerinizi Satın</h1>

    <hr style="color: #e5e5e5;">

    <div class="stepwizard mar1">

        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p>Kategori Seçimi</p>
            </div>

            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p>Ürün Açıklaması</p>
            </div>

            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p>Ürün Detayları</p>
            </div>

            <div class="stepwizard-step">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p>Ön İzleme & Onay</p>
            </div>

            <div class="stepwizard-step">
                <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                <p>Ödeme Seçeneği</p>
            </div>

        </div>
    </div>

    <hr style="color: #e5e5e5">

    <form role="form">

        <div class="row setup-content" id="step-1">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> 1. Adım</h3>
                    <hr>

                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <label class="control-label">Kelime Arama İle Ürün Kategorinizi Bulun <i style="font-size: 14px;" class="fa fa-caret-down"></i></label>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <input  maxlength="100" type="text" required="required" class="form-control" placeholder="Örnek : Samsung Galaxy S6"  />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <label class="control-label">Adım Adım Kategorinizi Bulun <i style="font-size: 14px;" class="fa fa-caret-right"></i></label>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Last Name" />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Sonraki Adım</button>

                </div>

            </div>

        </div>

        <div class="row setup-content" id="step-2">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> 2. Adım</h3>
                    <hr>
                    <div class="tabs-block">
                        <div class="products-carousel-tabs">
                            <ul class="nav nav-inline">
                                <li class="nav-item"><a class="nav-link  active" href="#tab-products-1" data-toggle="tab">Ürün Adeti</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab-products-2" data-toggle="tab">Satış Şekliniz</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-products-1" role="tabpanel">

                                <div class="row">
                                    <div class="col-md-8 mar1">
                                        <img style="max-width: 200px; max-height: 200px; margin-right: 50px; float: left;" src="<?=Yii::app()->request->baseUrl;?>/front/images/packing.png" class="img-responsive" alt="">

                                        <div class="sagcount">
                                            <p>Satacağınız Üründen Elinizde Kaç Adet Var ?</p>
                                            <span class="alttext">Artırarak veya yazarak adet sayısını girin.</span>
                                            <div id="CountSelect">

                                                <ul>
                                                    <li class="adeText"><span>Adet</span></li>
                                                    <li style="padding: 0; margin: 0;"><input type="text" value="0"></li>
                                                    <li class="adeText"><a href="">-</a></li>
                                                    <li><a href="">+</a></li>
                                                </ul>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-md-4"></div>
                                </div>



                            </div>

                            <div class="tab-pane" id="tab-products-2" role="tabpanel">

                                <div class="row">
                                    <div class="col-md-9 mar1">
                                        <img style="max-width: 200px; max-height: 200px; margin-right: 50px; float: left;" src="<?=Yii::app()->request->baseUrl;?>/front/images/Basket.png" class="img-responsive" alt="">

                                        <div class="sagcount">
                                            <p>Satış türünüzü seçtiniz mi?</p>
                                            <span class="alttext">Ürününüzü ister belirlediğiniz sabit bir fiyattan (Hemen AL fiyatı) ister açık artırma ile satın. Mağazanız varsa mağaza satışını seçin.</span>
                                            <br>
                                            <div id="buttons" class="center-block" role="group" aria-label="...">
                                                <button type="button" class="ubtn ubtn-default">Sabit Fiyat</button>
                                                <button type="button" class="ubtn ubtn-default">İhale Usulu</button>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-md-3"></div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Sonraki Adım</button>
                </div>
            </div>
        </div>

        <div class="row setup-content" id="step-3">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> 3. Adım</h3>
                    <hr>
                    <div class="tabs-block">
                        <div class="products-carousel-tabs">
                            <ul class="nav nav-inline">
                                <li class="nav-item"><a class="nav-link active" href="#tab-products-11" data-toggle="tab">Genel</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab-products-12" data-toggle="tab">Veri</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab-products-14" data-toggle="tab">Özellik</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab-products-15" data-toggle="tab">Seçenek</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab-products-16" data-toggle="tab">Yenilenen</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab-products-17" data-toggle="tab">İndirim</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab-products-18" data-toggle="tab">Kampanya</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab-products-19" data-toggle="tab">Resim</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-products-11" role="tabpanel">

                                <div class="row padding10">
                                    <div class="col-md-12 mar1">
                                        <p id="billing_last_name_field" class="form-row form-row">
                                            <label class="" for="billing_last_name">Ürün Adı <abbr title="required" class="required">*</abbr></label>
                                            <input type="text" value="" placeholder="Ürün Adı : " id="billing_last_name" name="billing_last_name" class="input-text ">
                                        </p>
                                        <div class="clear"></div>

                                        <p id="order_comments_field" class="form-row form-row notes">
                                            <label class="" for="order_comments">Ürün Açıklaması</label>
                                            <textarea cols="5" rows="2" placeholder="Ürün Açıklaması" id="order_comments" class="input-text " name="order_comments"></textarea>
                                        </p>

                                        <p id="billing_last_name_field" class="form-row form-row">
                                            <label class="" for="billing_last_name">Meta Başlığı <abbr title="required" class="required">*</abbr></label>
                                            <input type="text" value="" placeholder="Meta Başlığı : " id="billing_last_name" name="billing_last_name" class="input-text ">
                                        </p>
                                        <div class="clear"></div>

                                        <p id="order_comments_field" class="form-row form-row notes">
                                            <label class="" for="order_comments">Meta Açıklaması</label>
                                            <textarea cols="5" rows="2" placeholder="Meta Açıklaması" id="order_comments" class="input-text " name="order_comments"></textarea>
                                        </p>

                                        <p id="order_comments_field" class="form-row form-row notes">
                                            <label class="" for="order_comments">Meta Kelimeleri</label>
                                            <textarea cols="5" rows="2" placeholder="Meta Kelimeleri" id="order_comments" class="input-text " name="order_comments"></textarea>
                                        </p>

                                        <p id="billing_last_name_field" class="form-row form-row">
                                            <label class="" for="billing_last_name">Ürün Etiketleri <abbr title="required" class="required">*</abbr></label>
                                            <input type="text" value="" placeholder="Ürün Etiketleri : " id="billing_last_name" name="billing_last_name" class="input-text ">
                                        </p>
                                        <div class="clear"></div>

                                    </div>
                                </div>



                            </div>

                            <div class="tab-pane" id="tab-products-12" role="tabpanel">

                                <div class="row padding10">
                                    <div class="col-md-5 mar1">
                                        <p id="billing_last_name_field" class="form-row form-row">
                                            <span class="img-box1 col-lg-9 col-sm-9 col-xs-9">
                                            <img src="<?=Yii::app()->request->baseUrl;?>/front/images/factory-2.png" class="img-responsive img-box-img1" alt="">
                                            </span>
                                            <span class="col-lg-3 col-sm-3 col-xs-3">
                                               <span style="margin-bottom: 5px; width: 39px; cursor: pointer" class="ubtn ubtn-primary fileup" data-toggle="tooltip" data-placement="right" title="Logo Yükle"><i class="fa fa-upload"></i>
                                                   <input type="file">
                                               </span><br>
                                               <button style="width: 39px;" class="ubtn btn-danger" data-toggle="tooltip" data-placement="right" title="Logoyu Sil"><i class="fa fa-trash"></i></button>
                                            </span>
                                        </p>

                                        <div class="clearfix"></div>

                                        <p style="margin-top: -20px;" class="form-row form-row">

                                            <span class="img-box-thumb col-lg-3 col-sm-3 col-xs-3">
                                                <img src="<?=Yii::app()->request->baseUrl;?>/front/images/factory-2.png" class="img-responsive img-box-img1" alt="">
                                            </span>

                                             <span class="img-box-thumb col-lg-3 col-sm-3 col-xs-3">
                                                <img src="<?=Yii::app()->request->baseUrl;?>/front/images/factory-2.png" class="img-responsive img-box-img1" alt="">
                                             </span>

                                             <span class="img-box-thumb col-lg-3 col-sm-3 col-xs-3">
                                                <img src="<?=Yii::app()->request->baseUrl;?>/front/images/factory-2.png" class="img-responsive img-box-img1" alt="">
                                             </span>

                                             <span class="img-box-thumb col-lg-3 col-sm-3 col-xs-3">
                                                <img src="<?=Yii::app()->request->baseUrl;?>/front/images/factory-2.png" class="img-responsive img-box-img1" alt="">
                                             </span>

                                        </p>

                                    </div>

                                    <div class="col-md-7">


                                        <p id="billing_last_name_field" class="form-row form-row">
                                            <label class="" for="billing_last_name">Ürün Kodu <abbr title="required" class="required">*</abbr></label>
                                            <input type="text" value="" placeholder="Ürün Kodu : " id="billing_last_name" name="billing_last_name" class="input-text ">
                                        </p>
                                        <div class="clear"></div>

                                        <p id="billing_last_name_field" class="form-row form-row">
                                            <label class="" for="billing_last_name">Ürün Fiyatı <abbr title="required" class="required">*</abbr></label>
                                            <input type="text" value="" placeholder="Ürün Fiyatı : " id="billing_last_name" name="billing_last_name" class="input-text ">
                                        </p>
                                        <div class="clear"></div>

                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" id="tab-products-14" role="tabpanel">

                                <div class="row">
                                    <div class="col-md-9 mar1">
                                        <img style="max-width: 200px; max-height: 200px; margin-right: 50px; float: left;" src="<?=Yii::app()->request->baseUrl;?>/front/images/Basket.png" class="img-responsive" alt="">

                                        <div class="sagcount">
                                            <p>Satış türünüzü seçtiniz mi?</p>
                                            <span class="alttext">Ürününüzü ister belirlediğiniz sabit bir fiyattan (Hemen AL fiyatı) ister açık artırma ile satın. Mağazanız varsa mağaza satışını seçin.</span>
                                            <br>
                                            <div id="buttons" class="center-block" role="group" aria-label="...">
                                                <button type="button" class="ubtn ubtn-default">Sabit Fiyat</button>
                                                <button type="button" class="ubtn ubtn-default">İhale Usulu</button>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-md-3"></div>
                                </div>

                            </div>
                            <div class="tab-pane" id="tab-products-15" role="tabpanel">

                                <div class="row">
                                    <div class="col-md-9 mar1">
                                        <img style="max-width: 200px; max-height: 200px; margin-right: 50px; float: left;" src="<?=Yii::app()->request->baseUrl;?>/front/images/Basket.png" class="img-responsive" alt="">

                                        <div class="sagcount">
                                            <p>Satış türünüzü seçtiniz mi?</p>
                                            <span class="alttext">Ürününüzü ister belirlediğiniz sabit bir fiyattan (Hemen AL fiyatı) ister açık artırma ile satın. Mağazanız varsa mağaza satışını seçin.</span>
                                            <br>
                                            <div id="buttons" class="center-block" role="group" aria-label="...">
                                                <button type="button" class="ubtn ubtn-default">Sabit Fiyat</button>
                                                <button type="button" class="ubtn ubtn-default">İhale Usulu</button>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-md-3"></div>
                                </div>

                            </div>
                            <div class="tab-pane" id="tab-products-16" role="tabpanel">

                                <div class="row">
                                    <div class="col-md-9 mar1">
                                        <img style="max-width: 200px; max-height: 200px; margin-right: 50px; float: left;" src="<?=Yii::app()->request->baseUrl;?>/front/images/Basket.png" class="img-responsive" alt="">

                                        <div class="sagcount">
                                            <p>Satış türünüzü seçtiniz mi?</p>
                                            <span class="alttext">Ürününüzü ister belirlediğiniz sabit bir fiyattan (Hemen AL fiyatı) ister açık artırma ile satın. Mağazanız varsa mağaza satışını seçin.</span>
                                            <br>
                                            <div id="buttons" class="center-block" role="group" aria-label="...">
                                                <button type="button" class="ubtn ubtn-default">Sabit Fiyat</button>
                                                <button type="button" class="ubtn ubtn-default">İhale Usulu</button>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-md-3"></div>
                                </div>

                            </div>
                            <div class="tab-pane" id="tab-products-17" role="tabpanel">

                                <div class="row">
                                    <div class="col-md-9 mar1">
                                        <img style="max-width: 200px; max-height: 200px; margin-right: 50px; float: left;" src="<?=Yii::app()->request->baseUrl;?>/front/images/Basket.png" class="img-responsive" alt="">

                                        <div class="sagcount">
                                            <p>Satış türünüzü seçtiniz mi?</p>
                                            <span class="alttext">Ürününüzü ister belirlediğiniz sabit bir fiyattan (Hemen AL fiyatı) ister açık artırma ile satın. Mağazanız varsa mağaza satışını seçin.</span>
                                            <br>
                                            <div id="buttons" class="center-block" role="group" aria-label="...">
                                                <button type="button" class="ubtn ubtn-default">Sabit Fiyat</button>
                                                <button type="button" class="ubtn ubtn-default">İhale Usulu</button>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-md-3"></div>
                                </div>

                            </div>
                            <div class="tab-pane" id="tab-products-18" role="tabpanel">

                                <div class="row">
                                    <div class="col-md-9 mar1">
                                        <img style="max-width: 200px; max-height: 200px; margin-right: 50px; float: left;" src="<?=Yii::app()->request->baseUrl;?>/front/images/Basket.png" class="img-responsive" alt="">

                                        <div class="sagcount">
                                            <p>Satış türünüzü seçtiniz mi?</p>
                                            <span class="alttext">Ürününüzü ister belirlediğiniz sabit bir fiyattan (Hemen AL fiyatı) ister açık artırma ile satın. Mağazanız varsa mağaza satışını seçin.</span>
                                            <br>
                                            <div id="buttons" class="center-block" role="group" aria-label="...">
                                                <button type="button" class="ubtn ubtn-default">Sabit Fiyat</button>
                                                <button type="button" class="ubtn ubtn-default">İhale Usulu</button>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-md-3"></div>
                                </div>

                            </div>
                            <div class="tab-pane" id="tab-products-19" role="tabpanel">

                                <div class="row">
                                    <div class="col-md-9 mar1">
                                        <img style="max-width: 200px; max-height: 200px; margin-right: 50px; float: left;" src="<?=Yii::app()->request->baseUrl;?>/front/images/Basket.png" class="img-responsive" alt="">

                                        <div class="sagcount">
                                            <p>Satış türünüzü seçtiniz mi?</p>
                                            <span class="alttext">Ürününüzü ister belirlediğiniz sabit bir fiyattan (Hemen AL fiyatı) ister açık artırma ile satın. Mağazanız varsa mağaza satışını seçin.</span>
                                            <br>
                                            <div id="buttons" class="center-block" role="group" aria-label="...">
                                                <button type="button" class="ubtn ubtn-default">Sabit Fiyat</button>
                                                <button type="button" class="ubtn ubtn-default">İhale Usulu</button>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-md-3"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Sonraki Adım</button>
                </div>
            </div>
        </div>

        <div class="row setup-content" id="step-4">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> Step 4</h3>
                    <div class="form-group">
                        <label class="control-label">Company Name</label>
                        <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Company Address</label>
                        <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address"  />
                    </div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Sonraki Adım</button>
                </div>
            </div>
        </div>

        <div class="row setup-content" id="step-5">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> Step 5</h3>
                    <div class="form-group">
                        <label class="control-label">Company Name</label>
                        <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Company Address</label>
                        <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address"  />
                    </div>
                    <button class="btn btn-success btn-lg pull-right" type="submit">Tamamla</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-default');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function(){
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url']"),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for(var i=0; i<curInputs.length; i++){
                if (!curInputs[i].validity.valid){
                    isValid = true;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-primary').trigger('click');
    });
</script>