<div class="col-md-12">
    <div style="margin-bottom: 10px;" class="deger">
        <div class="inftitle">Bu mağaza son 12 ayda <span class="text-info"><b>1698</b></span> değerlendirmede <span class="text-success"><b>%99</b></span> olumlu puan aldı.</div>
    </div>
</div>
<div class="clearfix"></div>

<div style="margin: 0; padding: 0" class="col-md-12">
    <div class="col-md-3">

        <div style="border: 1px solid #e5e5e5; border-radius: 3px;" class="profile-sidebar">
            <!-- SIDEBAR USERPIC -->
            <div class="magazalogo">
                <a href="<?=Yii::app()->createUrl('sirket/urunler',array("id"=>Func::buildId($modelsupplier->code,$modelsupplier->name)))?>">
                    <img class="center-block img-responsive" src="<?=$modelcompany->logos3url?>" alt="">
                </a>
            </div>
            <!-- END SIDEBAR USERPIC -->
            <!-- SIDEBAR USER TITLE -->
            <div class="magazatitle">
                <?=$modelcompany->name?> <i class="fa fa-mobile" aria-hidden="true"></i> <i class="fa fa-home" aria-hidden="true"></i>
            </div>
            <hr>
            <div class="minfor">
                <p><b>Kayıt Tarihi : </b> <?=date("d-m-Y",strtotime($modelsupplier->dateadd) )?></p>
                <p><b>Email Adresi : </b> <?=$modelsupplier->email?></p>
                <?php if(!empty(Yii::app()->user->getState("user_id")) || !empty(Yii::app()->user->getState("supplier_id"))) :  ?>
                <p><b>Telefon No : </b>  <?=$modelsupplier->phone?></p>
                <p><b>Fax No : </b> <?=$modelsupplier->fax?></p>
                <?php else: ?>
                    <hr>
                <p class="text-info">Fax ve Telefon numarası için lütfen üye olunuz</p>
                    <hr>
                <?php endif; ?>
                <p><b>Adres :</b></p>
                <p><?=$modelcompany->address?></p>

            </div>
            <hr>
            <!-- END SIDEBAR USER TITLE -->
            <!-- SIDEBAR BUTTONS -->
            <div class="profile-userbuttons profile-userbuttons_<?=$modelcompany->supplierscompany_id?>">
                <?php $getsup = Yii::app()->user->getState("supplier_id"); if(empty($getsup)) : ?>
                <a href="<?=Yii::app()->createUrl("sirket/mesajyaz",array("id" => Func::buildId($modelsupplier->code,$modelcompany->name)))?>" class="ubtn btn-success btn-sm">Mesaj Yaz</a>
                <?php
                    $checkfollow = Func::checkFollow($modelcompany->supplierscompany_id,Yii::app()->user->getState("user_id"));
                ?>
                <a onclick="followcompany(<?=$modelcompany->supplierscompany_id?>)" id="flw_<?=$modelcompany->supplierscompany_id?>" type="button" class="ubtn btn-danger btn-sm"><?=$checkfollow == 0?"Takip Et":"Takibi bırak"?></a>

                <?php endif; ?>
            </div>
            <!-- END SIDEBAR BUTTONS -->
            <!-- SIDEBAR MENU -->
        </div>
        <div class="clearfix"></div>

        <div style="margin-top: 10px;" id="sidebar" class="sidebar" role="complementary">
            <aside class="widget woocommerce widget_product_categories electro_widget_product_categories">
                <ul class="product-categories category-single">
                    <li class="product_cat">

                        <ul>
                            <li style="font-weight: bold; font-size: 14px; padding: 3px; text-align: center">Mağaza Kategorileri</li>
                            <li class="cat-item current-cat"><a href="product-category.html">Laptops &amp; Computers</a> <span class="count">(13)</span>
                                <ul class='children'>
                                    <li class="cat-item"><a href="product-category.html">Laptops</a> <span class="count">(6)</span></li>
                                    <li class="cat-item"><a href="product-category.html">Ultrabooks</a> <span class="count">(1)</span></li>
                                    <li class="cat-item"><a href="product-category.html">Computers</a> <span class="count">(0)</span></li>

                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </aside>
            <div class="clearfix"></div>

            <aside style="margin-top: -50px; border: 1px solid #e5e5e5; padding: 20px 10px;" class="widget widget_products">
                <h3 class="widget-title">Mağaza Çalışma Saatleri</h3>
                <div class="clockss">
                    <p>Açılış saati : <?=!empty($modelcompany->opentime)?$modelcompany->opentime:"--:--"?></p>
                    <p>Kapanış saati : <?=!empty($modelcompany->closetime)?$modelcompany->closetime:"--:--"?></p>
                </div>

            </aside>
            <div class="clearfix"></div>
            <aside style="margin-top: -50px; border: 1px solid #e5e5e5; padding: 20px 10px;" class="widget widget_products">
                <h3 class="widget-title">En Çok Satılanlar</h3>
                <ul class="product_list_widget">
                    <li>
                        <a href="single-product.html" title="Notebook Black Spire V Nitro  VN7-591G">
                            <img width="180" height="180" src="<?=Yii::app()->request->baseUrl;?>/front/images/products/2.jpg" class="wp-post-image" alt=""/><span class="product-title">Notebook Black Spire V Nitro  VN7-591G</span>
                        </a>
                        <span class="electro-price"><ins><span class="amount">&#36;1,999.00</span></ins> <del><span class="amount">&#36;2,299.00</span></del></span>
                    </li>

                    <li>
                        <a href="single-product.html" title="Tablet Thin EliteBook  Revolve 810 G6">
                            <img width="180" height="180" src="<?=Yii::app()->request->baseUrl;?>/front/images/products/2.jpg" class="wp-post-image" alt=""/><span class="product-title">Tablet Thin EliteBook  Revolve 810 G6</span>
                        </a>
                        <span class="electro-price"><span class="amount">&#36;1,300.00</span></span>
                    </li>

                    <li>
                        <a href="single-product.html" title="Notebook Widescreen Z51-70  40K6013UPB">
                            <img width="180" height="180" src="<?=Yii::app()->request->baseUrl;?>/front/images/products/2.jpg" class="wp-post-image" alt=""/><span class="product-title">Notebook Widescreen Z51-70  40K6013UPB</span>
                        </a>
                        <span class="electro-price"><span class="amount">&#36;1,100.00</span></span>
                    </li>

                    <li>
                        <a href="single-product.html" title="Notebook Purple G952VX-T7008T">
                            <img width="180" height="180" src="<?=Yii::app()->request->baseUrl;?>/front/images/products/2.jpg" class="wp-post-image" alt=""/><span class="product-title">Notebook Purple G952VX-T7008T</span>
                        </a>
                        <span class="electro-price"><span class="amount">&#36;2,780.00</span></span>
                    </li>
                </ul>
            </aside>
        </div>

    </div>
    <div class='modal fade' id='modal' role='dialog'><div class='modal-dialog'><div class='modal-content'><div class='modal-header'><button type='button' class='close' data-dismiss='modal'>&times;</button><h4 class='modal-title'>Mesaj</h4></div><div class='modal-body'><p id="parag"></p></div><div class='modal-footer'><button type='button' class='btn btn-default' data-dismiss='modal'>Kapat</button></div></div></div></div>
