<?php

$this->renderPartial("head");

?>

<form role="form">

    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> 2. Adım</h3>
                <hr>
                <div class="tabs-block">
                    <div class="products-carousel-tabs">
                        <ul class="nav nav-inline">
                            <li class="nav-item"><a class="nav-link active" href="#tab-products-1" data-toggle="tab">Satış Şekliniz</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-products-1" role="tabpanel">

                            <div class="row">
                                <div class="col-lg-9 mar1">
                                    <div class="col-xs-12 col-lg-4">
                                        <img style="max-width: 200px; max-height: 200px; margin-right: 50px; float: left;" src="<?=Yii::app()->request->baseUrl;?>/front/images/Basket.png" class="img-responsive center-block" alt="">
                                    </div>

                                    <div class="col-xs-12 col-lg-8">
                                        <div class="sagcount">
                                            <p>Satış türünüzü seçtiniz mi?</p>
                                            <span class="alttext">Ürününüzü ister belirlediğiniz sabit bir fiyattan (Hemen AL fiyatı) ister açık artırma ile satın. Mağazanız varsa mağaza satışını seçin.</span>
                                            <br>
                                            <div id="buttons" class="center-block" role="group" aria-label="...">
                                                <div class="col-lg-6 col-xs-6">
                                                    <button type="button" class="ubtn ubtn-default btn-radio">Sabit Fiyat</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </div>

                                                <div class="col-lg-6 col-xs-6">
                                                    <button type="button" class="ubtn ubtn-default btn-radio">İhale Usulü</button>
                                                    <input type="checkbox" id="left-item" hidden="hidden">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-3 mar1"></div>
                            </div>

                        </div>
                    </div>
                </div>


                <a href="<?=Yii::app()->createUrl('createproduct/choosecategory')?>" class="btn btn-primary nextBtn btn-lg pull-left" type="button" >Geri Git</a>
                <a href="<?=Yii::app()->createUrl('createproduct/productinformations')?>" class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Sonraki Adım</a>
            </div>
        </div>
    </div>

</form>
</div>
