<div class="container product-page">
    <div class="row">
        <div class="block block-breadcrumbs">
            <ul>
                <li class="home">
                    <a href="#"><i class="fa fa-home"></i></a>
                    <span></span>
                </li>
                <li><a href="#">Beauty & Perfumes</a><span></span></li>
                <li>Men</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="row">
            <div class="col-sm-5">
                <div class="block block-product-image">
                    <div class="product-image easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                        <a href="<?=$arrimages[0]["imageXL"]?>">
                            <img src="<?=$arrimages[0]["imageXL"]?>" alt="Product" width="450" height="450" />
                        </a>
                    </div>
                    <div class="text">Resmi büyütmek için imleci üzerine götürün</div>
                    <div class="product-list-thumb">
                        <ul class="thumbnails kt-owl-carousel" data-margin="10" data-nav="true" data-responsive='{"0":{"items":2},"600":{"items":2},"1000":{"items":3}}'>
                            <?php foreach($arrimages as $key=>$value):?>
                                <li>
                                    <a class="selected" href="<?=$value["imageXL"]?>" data-standard="<?=$value["imageXL"]?>">
                                        <img src="<?=$value["imageXL"]?>" alt="" />
                                    </a>
                                </li>
                            <?php endforeach?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="row">
                    <div class="col-sm-12 col-md-7">
                        <div class="block-product-info">
                            <h2 class="product-name"><?=$modelProduct->name?></h2>

                            <div class="desc"> <?=$modelProduct->subtitle?></div>
                            <br>
                            <?php if($modelProduct->salestype == 2) :?>
                                <span style="font-size: 16px;"><u>İhale Başlangıç Fiyatı</u></span><br>
                            <?php endif; ?>
                            <div class="price-box">
                                <?php if($modelProduct->salestype == 1 && $modelProduct->price > 0) :  ?>
                                    <span class="product-price1">
                                        <?=number_format($modelProduct->price,2)?>
                                        <span style="font-size: 16px"><?=Params::getParams_("currency",$modelProduct->currency)?></span>
                                    </span>
                                <?php endif; ?>

                                <?php if($modelProduct->salestype == 2) :?>
                                    <span class="product-price">
                                        <?=number_format($modelProduct->startingprice,2)?>
                                        <span style="font-size: 16px"><?=Params::getParams_("currency",$modelProduct->currency)?></span>
                                    </span>
                                <?php endif; ?>

                            </div>
                            <div class="product-star">
                                <?php

                                    for($i = 0;$i<$modelProduct->totalpoint;$i++){
                                        echo "<i class=\"fa fa-star\"></i>";
                                    }

                                ?>
                            </div>
                            <hr>
                            <div class="variations-box">
                                <table class="variations-table">
                                    <?php if(empty(Yii::app()->user->getState("supplier_id"))) : ?>

                                    <tr>
                                        <td class="table-label">Adet</td>
                                        <td class="table-value">
                                            <div class="box-qty">
                                                <button onclick="pmin();" class="quantity-minus">-</button>
                                                <input type="text" class="quantity" id="count_number" name="quantity" value="1">
                                                <button onclick="pup();" class="quantity-plus">+</button>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="table-label">Beden</td>
                                        <td class="table-value">
                                            <ul class="list-check-box">
                                                <li><a href="#">39</a></li>
                                                <li><a href="#">40</a></li>
                                                <li><a href="#">41</a></li>
                                                <li><a href="#">42</a></li>
                                                <li><a href="#">43</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                        <tr>
                                            <td class="table-label">Renk</td>
                                            <td class="table-value">
                                                <ul class="list-check-box color">
                                                    <li><a class="selected" href="#"><span style="background:#4d6dbd;">Blue</span></a></li>
                                                    <li><a href="#"><span style="background:#fb5d5d;">Blue</span></a></li>
                                                    <li><a href="#"><span style="background:#2fbcda;">Blue</span></a></li>
                                                    <li><a href="#"><span style="background:#ffe00c;">Blue</span></a></li>
                                                    <li><a href="#"><span style="background:#72b226;">Blue</span></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(empty(Yii::app()->user->getState("supplier_id"))):?>
                                        <?php if($modelProduct->salestype==2):?>
                                            <tr>
                                                <td class="table-label">Teklif ver</td>
                                                <td class="table-value">
                                                    <input id="offermainprice" class="select-input0" type="text">
                                                    <select class="select-input1" id="decimal">
                                                        <option selected="selected" value="00">00 Kr.</option>
                                                        <option value="10">10 Kr.</option>
                                                        <option value="20">20 Kr.</option>
                                                        <option value="30">30 Kr.</option>
                                                        <option value="40">40 Kr.</option>
                                                        <option value="50">50 Kr.</option>
                                                        <option value="60">60 Kr.</option>
                                                        <option value="70">70 Kr.</option>
                                                        <option value="80">80 Kr.</option>
                                                        <option value="90">90 Kr.</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <p class="text-center"><strong>İhale Bitimine Kalan Süre</strong></p>
                                                <div class="form-group timer_background">
                                                    <div class="col-sm-12">
                                                        <div class="deal-countdown-timer center-block ">
                                                            <div id="deal-countdown1" class="countdown">
                                                                <span data-value="1" class="days"><span class="value ncolor" id="pro_day">1</span><b>GÜN</b></span>
                                                                <span class="hours"><span class="value ncolor" id="pro_hour">7</span><b>Saat</b></span>
                                                                <span class="minutes"><span class="value ncolor" id="pro_min">29</span><b>Dakika</b></span>
                                                                <span class="seconds"><span class="value ncolor" id="pro_sec">13</span><b>Saniye</b></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </table>
                                <hr/>
                                <?php if(empty(Yii::app()->user->getState("supplier_id"))) : ?>

                                <?php if($modelProduct->salestype==2):?>

                                    <a onclick="sendtenderoffer(<?=$modelProduct->products_id?>);" class="button-radius btn-add-cart">Teklif Ver<span class="icon"></span>
                                    </a>
                                    <div class="clearfix"></div>
                                <?php else: ?>

                                    <a onclick="addofferlist(<?=$modelProduct->code?>)" class="button-radius btn-add-cart">Teklif Sepetine Ekle<span class="icon"></span>
                                    </a>
                                    <div class="clearfix"></div>
                                <?php endif; ?>
                                <?php endif; ?>
                                <hr/>
                            </div>

                            <div class="box-control-button">
                                <?php if(empty(Yii::app()->user->getState("supplier_id"))) : ?>
                                <a title="Takip Listesine Ekle" class="link-wishlist" href="#">Takip Listesi</a>
                                <a title="Karşılaştırma Listesine Ekle" class="link-compare" href="#">Karşılaştır</a>
                                <a title="Satıcıya Mesaj Gönder" class="link-sendmail" href="#">Satıcıya Mesaj Gönder</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5">
                        <!-- block  top sellers -->
                        <div class="block block-top-sellers">
                            <div class="block-head">
                                <div class="block-title">
                                    <div class="block-icon">
                                        <img src="<?=Yii::app()->request->baseUrl;?>/front/data/top-seller-icon.png" alt="store icon">
                                    </div>
                                    <div class="block-title-text text-sm">Mağaza</div>
                                    <div class="block-title-text text-sm">Bilgileri</div>
                                </div>
                            </div>
                            <div class="block-inner">
                                <div style="margin: 0;padding: 0;" class="col-md-3">
                                    <span class="icon"><img class="img-responsive" src="<?=Yii::app()->request->baseUrl;?>/front/data/storeicon.png" alt="store icon"></span>

                                </div>
                                <div class="col-md-9">
                                    <span class="company"><a href="<?=Yii::app()->createUrl('sirket/urunler',array("id"=>Func::buildId($supinf->code,$modelSupplierscompany->name)))?>"><?=$modelSupplierscompany->name?></a></span>

                                    <div class="product-star">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>

                            </div>

                            <div class="block-inner">
                                <a style="width: 100%" class="btn btn-success" href="<?=Yii::app()->createUrl("sirket/mesajyaz",array("id" => Func::buildId($supinf->code,$modelSupplierscompany->name)))?>">Mağazaya Soru Sor</a>
                            </div>
                        </div>
                        <!-- block  top sellers -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Product tab -->
        <div class="block block-tabs tab-left">
            <div class="block-head">
                <ul class="nav-tab">
                    <li class="active"><a data-toggle="tab" href="#tab-1">Ürün Açıklaması</a></li>
                    <li><a data-toggle="tab" href="#tab-3">Satıcının Aldığı Yorumlar</a></li>
                </ul>
            </div>
            <div class="block-inner">
                <div class="tab-container">
                    <div id="tab-1" class="tab-panel active">
                            <?=$modelProduct->text?>
                    </div>
                    <div id="tab-3" class="tab-panel">
                        <div id="reviews">
                            <h4 class="comments-title">Bu ürün için <?=count($modelreviews);?> yorum yapıldı.</h4>
                            <ol class="comment-list">
                                <?php foreach ($modelreviews as $key => $value) : ?>

                                <li class="comment">
                                    <div class="comment-avatar">
                                        <img src="<?=Yii::app()->request->baseUrl;?>/front/data/avatar.jpg" alt="Avatar">
                                    </div>
                                    <div class="comment-content">
                                        <div class="comment-meta">
                                            <a href="#" class="comment-author"><?=$value->username?></a>
                                            <span class="comment-date"><?=$value->dateadd?></span>
                                            <div class="review-rating">
                                                <?php

                                                    for($i=0;$i<$value->point;$i++){
                                                        echo "<i class=\"fa fa-star\"></i>";
                                                    }


                                                ?>
                                            </div>
                                        </div>
                                        <div class="comment-entry">
                                            <p><?=$value->text?></p>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product tab -->
        <!-- Related Products -->
        <div class="block block-products-owl">
            <div class="block-head">
                <div class="block-title">
                    <div class="block-title-text text-lg">İlgili Ürünler</div>
                </div>
            </div>
            <div class="block-inner">
                <ul class="products kt-owl-carousel" data-margin="20" data-loop="true" data-nav="true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":5}}'>
                    <li class="product">
                        <div class="product-container">
                            <div class="product-left">
                                <div class="product-thumb">
                                    <a class="product-img" href="#"><img src="data/option1/p35.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="product-right">
                                <div class="product-name">
                                    <a href="#">Cotton Lycra Leggings</a>
                                </div>
                                <div class="price-box">
                                    <span class="product-price">$139.98</span>
                                    <span class="product-price-old">$169.00</span>
                                </div>
                                <div class="product-star">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <div class="product-button">
                                    <a class="btn-add-wishlist" title="Add to Wishlist" href="#">Add Wishlist</a>
                                    <a class="btn-add-comparre" title="Add to Compare" href="#">Add Compare</a>
                                    <a class="button-radius btn-add-cart" title="Add to Cart" href="#">Buy<span class="icon"></span></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="product">
                        <div class="product-container">
                            <div class="product-left">
                                <div class="product-thumb">
                                    <a class="product-img" href="#"><img src="data/option1/p36.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="product-right">
                                <div class="product-name">
                                    <a href="#">Cotton Lycra Leggings</a>
                                </div>
                                <div class="price-box">
                                    <span class="product-price">$139.98</span>
                                    <span class="product-price-old">$169.00</span>
                                </div>
                                <div class="product-star">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <div class="product-button">
                                    <a class="btn-add-wishlist" title="Add to Wishlist" href="#">Add Wishlist</a>
                                    <a class="btn-add-comparre" title="Add to Compare" href="#">Add Compare</a>
                                    <a class="button-radius btn-add-cart" title="Add to Cart" href="#">Buy<span class="icon"></span></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="product">
                        <div class="product-container">
                            <div class="product-left">
                                <div class="product-thumb">
                                    <a class="product-img" href="#"><img src="data/option1/p37.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="product-right">
                                <div class="product-name">
                                    <a href="#">Cotton Lycra Leggings</a>
                                </div>
                                <div class="price-box">
                                    <span class="product-price">$139.98</span>
                                    <span class="product-price-old">$169.00</span>
                                </div>
                                <div class="product-star">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <div class="product-button">
                                    <a class="btn-add-wishlist" title="Add to Wishlist" href="#">Add Wishlist</a>
                                    <a class="btn-add-comparre" title="Add to Compare" href="#">Add Compare</a>
                                    <a class="button-radius btn-add-cart" title="Add to Cart" href="#">Buy<span class="icon"></span></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="product">
                        <div class="product-container">
                            <div class="product-left">
                                <div class="product-thumb">
                                    <a class="product-img" href="#"><img src="data/option1/p38.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="product-right">
                                <div class="product-name">
                                    <a href="#">Cotton Lycra Leggings</a>
                                </div>
                                <div class="price-box">
                                    <span class="product-price">$139.98</span>
                                    <span class="product-price-old">$169.00</span>
                                </div>
                                <div class="product-star">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <div class="product-button">
                                    <a class="btn-add-wishlist" title="Add to Wishlist" href="#">Add Wishlist</a>
                                    <a class="btn-add-comparre" title="Add to Compare" href="#">Add Compare</a>
                                    <a class="button-radius btn-add-cart" title="Add to Cart" href="#">Buy<span class="icon"></span></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="product">
                        <div class="product-container">
                            <div class="product-left">
                                <div class="product-thumb">
                                    <a class="product-img" href="#"><img src="data/option1/p39.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="product-right">
                                <div class="product-name">
                                    <a href="#">Cotton Lycra Leggings</a>
                                </div>
                                <div class="price-box">
                                    <span class="product-price">$139.98</span>
                                    <span class="product-price-old">$169.00</span>
                                </div>
                                <div class="product-star">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <div class="product-button">
                                    <a class="btn-add-wishlist" title="Add to Wishlist" href="#">Add Wishlist</a>
                                    <a class="btn-add-comparre" title="Add to Compare" href="#">Add Compare</a>
                                    <a class="button-radius btn-add-cart" title="Add to Cart" href="#">Buy<span class="icon"></span></a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ./Related Products -->

    </div>
</div>
