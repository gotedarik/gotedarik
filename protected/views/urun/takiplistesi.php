<div class="container">
    <div class="row">
        <div class="block block-breadcrumbs">
            <ul>
                <li class="home">
                    <a href="#"><i class="fa fa-home"></i></a>
                    <span></span>
                </li>
                <li>Takip Listem</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-3">
                <div class="sidebar">
                    <!-- block  top sellers -->
                    <div class="block block-top-sellers">
                        <div class="block-head">
                            <div class="block-title">
                                <div class="block-icon">
                                    <img src="<?=Yii::app()->request->baseUrl;?>/front/data/top-seller-icon.png" alt="store icon">
                                </div>
                                <div class="block-title-text text-sm">top</div>
                                <div class="block-title-text text-lg">SELLERS</div>
                            </div>
                        </div>
                        <div class="block-inner">
                            <ul class="products kt-owl-carousel" data-items="1" data-autoplay="true" data-loop="true" data-nav="true">
                                <li class="product">
                                    <div class="product-container">
                                        <div class="product-left">
                                            <div class="product-thumb">
                                                <a class="product-img" href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/option1/p1.jpg" alt=""></a>
                                                <a title="Quick View" href="#" class="btn-quick-view">Quick View</a>
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
                                                <a class="product-img" href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/option1/p2.jpg" alt=""></a>
                                                <a title="Quick View" href="#" class="btn-quick-view">Quick View</a>
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
                    <!-- block  top sellers -->
                    <div class="block-sidebar-img banner-hover">
                        <a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/banner/3.jpg" alt="Banner"></a>
                    </div>
                    <!-- block SPECIALS -->
                    <div class="block block-specials">
                        <div class="block-head">SPECIALS</div>
                        <div class="block-inner">
                            <div class="product">
                                <div class="image">
                                    <a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/option1/p23.jpg" alt="p23.jpg"></a>
                                </div>
                                <div class="product-name">
                                    <a href="#">Cotton Lycra Leggings</a>
                                </div>
                                <div class="price-box">
                                    <span class="product-price">$139.98</span>
                                    <span class="product-price-old">$169.00</span>
                                </div>
                            </div>
                            <a href="#" class="button-radius">All Specials<span class="icon"></span></a>
                        </div>
                    </div>
                    <!-- ./block SPECIALS -->
                </div>

            </div>
            <div class="col-xs-12 col-sm-8 col-md-9">
                <h1 class="page-title">Takip Listem</h1>
                <div class="page-content">
                </div>

                <table class="table table-bordered table-wishlist">
                    <thead>
                    <tr>
                        <th>Ürün Adı</th>
                        <th>Ürün Fiyatı</th>
                        <th>Sil</th>
                    </tr>
                    </thead>
                    <tbody id="allbasket">
                    <?php


                    if(Func::followcount() == 0){
                        echo "<tr><td style='text-align: center;' colspan='4'>Takip Listeniz Boş</td></tr>";
                    }

                    ?>
                        <?php foreach ($model as $key => $value) : ?>
                            <tr id="<?=$value->code?>">
                                <td><a href="<?=Yii::app()->createUrl("urun/view",array("id" =>Func::buildId($value->code,$value->product_name)))?>"><?=$value->product_name?></a></td>
                                <td><span class="amount"><?=number_format($value->product_price,2)?>&nbsp;<?=Params::getParams_("currency",$value->currency)?></span></td>
                                <td style="cursor: pointer;" class="text-center"><a onclick="deletefollowitem(<?=$value->code?>)"><i class="fa fa-close"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <ul class="row list-wishlist">
                    <?php foreach ($model as $key => $value) : ?>
                        <li id="<?=$value->code?>_li" class="col-sm-6 col-md-3">
                            <div class="product-img">
                                <a href="<?=Yii::app()->createUrl("urun/view",array("id" =>Func::buildId($value->code,$value->product_name)))?>"><img src="<?=$value->product_imageS?>" alt="<?=$value->product_name?>"></a>
                            </div>
                            <h5 class="product-name">
                                <a href="#"><?=$value->product_name?></a>
                            </h5>

                            <div class="button-action">
                                <button onclick="window.location.href = '<?=Yii::app()->createUrl("urun/view",array("id" =>Func::buildId($value->code,$value->product_name)))?>'" class="button button-sm">İncele</button>
                                <a style="cursor: pointer" onclick="deletefollowitem(<?=$value->code?>)"><i class="fa fa-close"></i></a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

</div>
